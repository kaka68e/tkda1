<?php

namespace backend\controllers;

use Yii;
use backend\models\Conduct;
use backend\models\search\ConductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ConductController implements the CRUD actions for Conduct model.
 */
class ConductController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
       return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        // 'actions' => ['logout', 'index','trinhdo'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Lists all Conduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Conduct model.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @return mixed
     */
    public function actionView($id_classroom, $id_term, $id_student)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_classroom, $id_term, $id_student),
        ]);
    }

    /**
     * Creates a new Conduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Conduct();

        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Thêm mới thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Conduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @return mixed
     */
    public function actionUpdate($id_classroom, $id_term, $id_student)
    {
        $model = $this->findModel($id_classroom, $id_term, $id_student);

        $time = time();
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->addFlash('success','Cập nhật thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Conduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @return mixed
     */
    public function actionDelete($id_classroom, $id_term, $id_student)
    {
        $this->findModel($id_classroom, $id_term, $id_student)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Conduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @return Conduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_classroom, $id_term, $id_student)
    {
        if (($model = Conduct::findOne(['id_classroom' => $id_classroom, 'id_term' => $id_term, 'id_student' => $id_student])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionExcel($name)
    {
        $flag = [];
        $inputFile = $name;
        try{
            $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
            $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($inputFile);
        } catch (Exception $e) {
            die('Error');
        }

        $sheet = $objPHPExcel->getSheet(0);
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();
        $rann = 0;
        for($row=1; $row <= $highestRow; $row++)
        {
            $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);
            $rann++;
            if($row==1)
            {
                continue;
            }
             if($rowData[0][0]=='')
            {
                continue;
            }


            $siswa = new Conduct();
            $siswa->id_classroom = (string)$rowData[0][0]; 
            $siswa->id_term  = $rowData[0][1]; 
            $siswa->id_student  = (string)$rowData[0][2]; 
            $siswa->rating  = $rowData[0][3]; 
            $siswa->comment  = (string)$rowData[0][4]; 



            $siswa->status  = 1; 
            $time = time()+$rann;
            $siswa->created_at  =  $time; 
            $siswa->updated_at  =  $time; 



            $siswa->save();
            if (count($siswa->getErrors())>0) {
                array_push($flag,1);
                echo '<pre>';
                print_r($siswa->getErrors());

        
            }
            
        }
        if (count($flag) == 0) {
            Yii::$app->session->addFlash('success','Cập nhật thành công!');
            return $this->redirect(['index']);
        }
        
    }





}
