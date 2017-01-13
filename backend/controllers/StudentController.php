<?php

namespace backend\controllers;

use Yii;
use backend\models\Student;
use backend\models\search\StudentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\filters\AccessControl;

/**
 * StudentController implements the CRUD actions for Student model.
 */
class StudentController extends Controller
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
     * Lists all Student models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Student model.
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
     * Creates a new Student model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Student();
        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) {

            $urlDelete = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
            $urlDelete = str_replace('backend/web/index.php', '', $urlDelete);
            $urlImg = Yii::$app->request->post();
            $link = $urlImg['Student']['image'];
            $link = str_replace($urlDelete.'/', '', $link);
            $model->image = $link;

            if ($model->save()) {
                Yii::$app->session->addFlash('success','Thêm thành công');
                return $this->redirect(['view', 'id' => $model->student_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Student model.
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

            $urlDelete = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
            $urlDelete = str_replace('backend/web/index.php', '', $urlDelete);
            $urlImg = Yii::$app->request->post();
            $link = $urlImg['Student']['image'];
            $link = str_replace($urlDelete.'/', '', $link);
            $model->image = $link;
            if ($model->save()) {
                 Yii::$app->session->addFlash('success','Cập nhật thành công');
                 return $this->redirect(['view', 'id' => $model->student_id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }   
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Student model.
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
     * Finds the Student model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Student the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
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


            $siswa = new Student();
            $siswa->student_id = (string)$rowData[0][0]; 
            $siswa->student_name  = $rowData[0][1]; 
            $siswa->birthday  = '2008-01-22';
            $siswa->sex  = $rowData[0][3]; 
            $siswa->disabilities  = $rowData[0][4]; 
            $siswa->id_nation  = $rowData[0][5]; 
            $siswa->parent_name  = $rowData[0][6]; 
            $siswa->phone  = $rowData[0][7]; 
            $siswa->address  = (string)$rowData[0][8];

            $siswa->image  = 'uploads/images/default/a1.jpg'; 
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

    public function actionSearch($name_student)
    {
        $searchModel = new StudentSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams,$name_student);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }



    


}
