<?php

namespace backend\controllers;

use Yii;
use backend\models\Classroom;
use backend\models\search\ClassroomSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ClassroomController implements the CRUD actions for Classroom model.
 */
class ClassroomController extends Controller
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
     * Lists all Classroom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClassroomSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Classroom model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Classroom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Classroom();
        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Thêm mới thành công ! ');
            return $this->redirect(['view', 'id' => $model->classroom_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Classroom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $time = time();
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Cập nhật thành công ! ');
            return $this->redirect(['view', 'id' => $model->classroom_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Classroom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Classroom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Classroom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classroom::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetallalassroombyyear($year_id)
    {
        $classroom = new Classroom();
        $data = $classroom->getAllClassroomByYear($year_id);
        return $this->renderAjax('ClassroomByYear',['data'=>$data]);
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


            $siswa = new Classroom();
            $siswa->classroom_id = (string)$rowData[0][0]; 
            $siswa->id_year  = (string)$rowData[0][1]; 
            $siswa->id_block  = $rowData[0][2];

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
