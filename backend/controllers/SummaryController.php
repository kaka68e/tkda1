<?php

namespace backend\controllers;

use Yii;
use backend\models\Summary;
use backend\models\Studentclass;
use backend\models\Subject;
use backend\models\Study;
use backend\models\Conduct;
use backend\models\search\SummarySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SummaryController implements the CRUD actions for Summary model.
 */
class SummaryController extends Controller
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
     * Lists all Summary models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SummarySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Summary model.
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
     * Creates a new Summary model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Summary();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Summary model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id_classroom
     * @param string $id_student
     * @return mixed
     */
    public function actionUpdate($id_classroom, $id_student)
    {
        $model = $this->findModel($id_classroom, $id_student);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Summary model.
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
     * Finds the Summary model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id_classroom
     * @param string $id_student
     * @return Summary the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_classroom, $id_student)
    {
        if (($model = Summary::findOne(['id_classroom' => $id_classroom, 'id_student' => $id_student])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetsummary($class_submit)
    {
        $studentclass = new Studentclass();
        $data_student_by_class = $studentclass->getAllStudetByClassroom($class_submit);

        if (count($data_student_by_class) == 0) {
            Yii::$app->session->addFlash('success','Lớp '.$class_submit.' không có học sinh nào');
            return $this->redirect(['index']);
        }



        $rann = 0;
        $tong_ban_ghi = 0;
        foreach ($data_student_by_class as $key => $value) {

            $data_summary_exist = Summary::find()->asArray()
            ->where(['status'=>1,'id_classroom'=>$class_submit,'id_student'=>$key])
            ->one();
            if (count($data_summary_exist)>0) {
                continue;
            } // đoạn này kiểm tra xem nếu đã tính tổng kết thì bỏ qua bạn này

            $diem_ki_1 = Study::find()->asArray()
            ->where(['status'=>1,'id_term'=>1,'id_classroom'=>$class_submit,'id_student'=>$key,'id_subject'=>'TKHK1'])
            ->one();

            $diem_ki_2 = Study::find()->asArray()
            ->where(['status'=>1,'id_term'=>2,'id_classroom'=>$class_submit,'id_student'=>$key,'id_subject'=>'TKHK2'])
            ->one();

            // if (empty($diem_ki_1['result'])) {
            //     $diem1 = 0;
            // }else{
            //     $diem1 = $diem_ki_1['result'];
            // }

            // if (empty($diem_ki_2['result'])) {
            //     $diem2 = 0;
            // } else{
            //     $diem2 = $diem_ki_2['result'];
            // }


            if (empty($diem_ki_1['result'])) {
                continue;
            }else{
                $diem1 = $diem_ki_1['result'];
            }

            if (empty($diem_ki_2['result'])) {
                continue;
            } else{
                $diem2 = $diem_ki_2['result'];
            }

            //Bug
            // echo '<br>';
            // echo $diem1;
            // echo '<br>';
            // echo $diem2;
            // echo '<br>';
            // echo "----";
            // $diem = $diem1 + $diem2*2;
            // $rann++;
            // echo $diem;
            // echo '<br>';
            // $diemTB = number_format($diem/3,2);
            // echo $diemTB;
            // echo '<br>';
            // EndBug

            $diem = $diem1 + $diem2*2;
            $rann++;
            $diemTB = number_format($diem/3,2);




            // Tính hạnh kiểm
            $hk_ki_1 = Conduct::find()->asArray()
            ->where(['status'=>1,'id_term'=>1,'id_classroom'=>$class_submit,'id_student'=>$key])
            ->one();

            $hk_ki_2 = Conduct::find()->asArray()
            ->where(['status'=>1,'id_term'=>2,'id_classroom'=>$class_submit,'id_student'=>$key])
            ->one();

            if (empty($hk_ki_1['rating'])) {
                continue;
            }else{
                $hk1 = $hk_ki_1['rating'];
            }

            if (empty($hk_ki_2['rating'])) {
                continue;
            } else{
                $hk2 = $hk_ki_2['rating'];
            }


            $a = $hk2 - $hk1;

            //bug
            // echo $key;
            // echo '<br>';
            // echo $hk1;
            // echo '<br>';
            // echo $hk2;
            // echo '<br>';
            // // echo $a;
            // echo '<br>';
           

            // if ($a == 1 || $a == -1 || $a == 0) {
            //     $hanhkiemTB = $hk2;
            // }else if ($a >= 2) {
            //     $hanhkiemTB = $hk1 + 2;
            // }else {
            //     $hanhkiemTB = $hk2 + 1;
            // }

            // echo $hanhkiemTB;
            // echo '<br>';
            //  echo "-----";
            // echo '<br>';

            // endbug




            // Xử lí thật
            if ($a == 1 || $a == -1 || $a == 0) {
                $hanhkiemTB = $hk2;
            }else if ($a >= 2) {
                $hanhkiemTB = $hk1 + 2;
            }else {
                $hanhkiemTB = $hk2 + 1;
            }

            // Tính giá trị của xếp loại

            if ($diemTB >= 9) {
                $danh_gia = 1;
            } else if ($diemTB >= 8) {
                $danh_gia = 2;
            } else if ($diemTB >= 7) {
                $danh_gia = 3;
            } else if ($diemTB >= 5) {
                $danh_gia = 4;
            } else {
                $danh_gia = 5;
            }


            // Đỗ hay trượt
            if ($danh_gia == 5 && $hanhkiemTB == 5) {
                $do_truot = 0;
            } else{
                $do_truot = 1;
            }
        
            $model = new Summary();
            $model->id_classroom = (string)$class_submit;
            $model->id_student = (string)$key;
            $model->average_mark = $diemTB;
            $model->average_conduct = $hanhkiemTB;
            $model->rating = $danh_gia;
            $model->confirm =  $do_truot;
            $model->comment = 'Tổng kết của học sinh '.$key.' lơp: '.$class_submit;


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

        if ($tong_ban_ghi == 0) {
            Yii::$app->session->addFlash('success','Thiểu thông tin về hạnh kiểm của học sinh hoặc điểm trung bình từng kì của học sinh');
            return $this->redirect(['index']);
        }

        Yii::$app->session->addFlash('success','Tính điểm hoàn thành, số lượng :'.$tong_ban_ghi.' bản ghi mới');
        return $this->redirect(['index']);
    }
}
