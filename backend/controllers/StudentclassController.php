<?php

namespace backend\controllers;

use Yii;
use backend\models\Studentclass;
use backend\models\search\StudentclassSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * StudentclassController implements the CRUD actions for Studentclass model.
 */
class StudentclassController extends Controller
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
     * Lists all Studentclass models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentclassSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Studentclass model.
     * @param string $id_classroom
     * @param string $id_student
     * @return mixed
     */
    public function actionView($id_classroom, $id_student)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_classroom, $id_student),
        ]);
    }

    /**
     * Creates a new Studentclass model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Studentclass();
        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Thêm mới thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Studentclass model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_classroom
     * @param string $id_student
     * @return mixed
     */
    public function actionUpdate($id_classroom, $id_student)
    {
        $model = $this->findModel($id_classroom, $id_student);
        $time = time();
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Cập nhật thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Studentclass model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_classroom
     * @param string $id_student
     * @return mixed
     */
    public function actionDelete($id_classroom, $id_student)
    {
        $this->findModel($id_classroom, $id_student)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Studentclass model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_classroom
     * @param string $id_student
     * @return Studentclass the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_classroom, $id_student)
    {
        if (($model = Studentclass::findOne(['id_classroom' => $id_classroom, 'id_student' => $id_student])) !== null) {
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


            $siswa = new Studentclass();
            $siswa->id_classroom = (string)$rowData[0][0]; 
            $siswa->id_student  = (string)$rowData[0][1]; 

 
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


    public function actionGetallstudentbyclassroom($classroom_id)
    {
        $student = new Studentclass();
        $data = $student->getAllStudetByClassroom($classroom_id);
        return $this->renderAjax('StudentByClassroom',['data'=>$data]);
    }

    
}
