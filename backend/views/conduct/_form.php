<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Term;
use backend\models\Year;
use backend\models\Classroom;

/* @var $this yii\web\View */
/* @var $model backend\models\Conduct */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
$year = new Year();
$classroom = new Classroom();
$data_year = $year->getAllYear();
?>

<div class="conduct-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?php $term = new Term(); ?>

            <?= $form->field($model, 'id_classroom')->dropDownList(
                $classroom->getAllClassroom(),
                ['prompt'=>'--- Chọn lớp học ---']
            )?>

            <?= $form->field($model, 'id_term')->dropDownList(
                $term->getAllTerm(),
                ['class'=>'bs-select form-control','prompt'=>'--- Chọn kì học ---']
            ) ?>

            <?php 
                echo Html::a('',['/studentclass/getallstudentbyclassroom'],['id'=>'href3'])
             ?>

            <?= $form->field($model, 'id_student')->dropDownList(
                [],
                ['class'=>'bs-select form-control','prompt'=>'--- Chọn học sinh ---']
            ) ?>

            <?= $form->field($model, 'rating')->dropDownList(
                [
                    '1' => 'Hạnh Kiểm Xuất Sắc',
                    '2' => 'Hạnh Kiểm Tốt',
                    '3' => 'Hạnh Kiểm Khá',
                    '4' => 'Hạnh Kiểm Trung Bình',
                    '5' => 'Hạnh Kiểm Yếu',
                ],
                ['class'=>'bs-select form-control']
            ); ?>

            <?= $form->field($model, 'comment')->textArea(['maxlength' => true,'rows'=>6]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>

        <div class="col-md-5">
            <label for="">Chọn năm học để lấy danh sách các lớp được mở</label>
            <?php 
                echo Html::a('',['/classroom/getallalassroombyyear'],['id'=>'href'])
             ?>
            <select class="form-control" style="margin-bottom: 20px" id="select-year-studentclass">
            <option value="">--- Chọn năm học ---</option>
            <?php 
                foreach ($data_year as $key => $value) :
             ?>
              <option value="<?php echo $key ?>"><?php echo $value ?></option>
            <?php 
                endforeach;
             ?>
            </select>



        </div>
    </div>

</div>