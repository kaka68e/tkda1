<?php

namespace backend\controllers;
use Yii;
use backend\models\Summary;
use backend\models\Studentclass;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionReport1()
    {
    	return $this->render('report1');
    }

    public function actionResultreport1($class_submit)
    {
        $this->layout = "main_report";
        // $sum_studentclass = new Summary();
        $data_summary_student_by_class = Summary::find()->asArray()->where(['status'=>1,'id_classroom'=>$class_submit])->all();

        if (count($data_summary_student_by_class) == 0) {
            Yii::$app->session->addFlash('success','Lớp '.$class_submit.' chưa có thông tin tổng kết');
            return $this->redirect(['report/report1']);
        }

        
    	return $this->render('resultreport1');
    }

}
