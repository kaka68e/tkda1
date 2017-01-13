<?php

namespace backend\controllers;

use Yii;
use backend\models\Study;
use backend\models\Studentclass;
use backend\models\search\StudySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * StudyController implements the CRUD actions for Study model.
 */
class StudyController extends Controller
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
     * Lists all Study models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Study model.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @param string $id_subject
     * @return mixed
     */
    public function actionView($id_classroom, $id_term, $id_student, $id_subject)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_classroom, $id_term, $id_student, $id_subject),
        ]);
    }

    /**
     * Creates a new Study model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Study();
        $time = time();
        $model->created_at = $time;
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Thêm mới thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student, 'id_subject' => $model->id_subject]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Study model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @param string $id_subject
     * @return mixed
     */
    public function actionUpdate($id_classroom, $id_term, $id_student, $id_subject)
    {
        $model = $this->findModel($id_classroom, $id_term, $id_student, $id_subject);
        $time = time();
        $model->updated_at = $time;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success','Cập nhật thành công   !');
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student, 'id_subject' => $model->id_subject]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Study model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @param string $id_subject
     * @return mixed
     */
    public function actionDelete($id_classroom, $id_term, $id_student, $id_subject)
    {
        $this->findModel($id_classroom, $id_term, $id_student, $id_subject)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Study model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_classroom
     * @param integer $id_term
     * @param string $id_student
     * @param string $id_subject
     * @return Study the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_classroom, $id_term, $id_student, $id_subject)
    {
        if (($model = Study::findOne(['id_classroom' => $id_classroom, 'id_term' => $id_term, 'id_student' => $id_student, 'id_subject' => $id_subject])) !== null) {
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


            $siswa = new Study();
            $siswa->id_classroom = (string)$rowData[0][0]; 
            $siswa->id_term  = $rowData[0][1]; 
            $siswa->id_student  = (string)$rowData[0][2];
            $siswa->id_subject  = (string)$rowData[0][3]; 
            $siswa->result  = $rowData[0][4]; 
            $siswa->comment  = (string)$rowData[0][5]; 


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

    public function actionGetaveragemark($class_submit,$term_submit)
    {
        $studentclass = new Studentclass();
        $data_student_by_class = $studentclass->getAllStudetByClassroom($class_submit);

        if (count($data_student_by_class) == 0) {
            Yii::$app->session->addFlash('success','Lớp '.$class_submit.' không có học sinh nào');
            return $this->redirect(['index']);
        }

        $rann = 0;
        $tong_ban_ghi = 0;
        if ($term_submit == 1) {
            $id_subject1 = 'TKHK1';
        } else {
            $id_subject1 = 'TKHK2';
        }

        foreach ($data_student_by_class as $key => $value) {

            $data_average_exist = Study::find()->asArray()
            ->where(['status'=>1,'id_term'=>$term_submit,'id_classroom'=>$class_submit,'id_student'=>$key,'id_subject'=>$id_subject1])
            ->one();
            if (count($data_average_exist)>0) {
                continue;
            } // đoạn này kiểm tra xem nếu đã tính điểm thì bỏ qua bạn này

            $data_study = Study::find()->asArray()
            ->where(['status'=>1,'id_term'=>$term_submit,'id_classroom'=>$class_submit,'id_student'=>$key])
            ->all();
            if (count($data_study)==0) {
                continue;
            }; // Kiêm tra xem đã có thông tin về điểm các môn hay chưa?

            

            $diem = 0;
            $tongmon =0;
            $rann++;

            foreach ($data_study as $item) {
                // Đoạn này dùng để dubug
                // echo $item['id_student'];echo '<br>';
                // echo $item['result'];echo '<br>';
                // $tongmon++;
                // echo $tongmon;echo '<br>';
                // $diem += $item['result'];
                // echo $diem;echo '<br>';
                // echo $diem/$tongmon;echo '<br>';
                // $diemTB = number_format($diem/$tongmon,2);
                // echo $diemTB;echo '<br>';
                // echo '-------------';
                // echo '<br>';
                //Hết


                // Xử lí thật
                $tongmon++;
                $diem += $item['result'];
            }
            $diemTB = number_format($diem/$tongmon,2);
            $model = new Study();
            $model->id_classroom = (string)$class_submit;
            $model->id_term = $term_submit;
            $model->id_student = (string)$item['id_student'];
            $model->id_subject = (string)$id_subject1;
            $model->result = $diemTB;
            $model->comment = 'Điểm trung bình của học kì '.$term_submit;
            $time = time()+$rann;
            $model->created_at = $time;
            $model->updated_at = $time;
            if ($model->save()) {
               $tong_ban_ghi += 1;
            }
            if (count($model->getErrors())>0) {
                echo '<pre>';
                print_r($model->getErrors());
            }
            
        }
        // die();
        if ($tong_ban_ghi == 0) {
            Yii::$app->session->addFlash('success','Thiểu thông tin về điểm thành phần của học sinh hoặc đã được tính trước đó.');
            return $this->redirect(['index']);
        }

        Yii::$app->session->addFlash('success','Tính điểm hoàn thành, số lượng :'.$tong_ban_ghi.' bản ghi mới');
        return $this->redirect(['index']);
    }




}
