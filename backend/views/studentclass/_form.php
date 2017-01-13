<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Classroom;
use backend\models\Year;

/* @var $this yii\web\View */
/* @var $model backend\models\Studentclass */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
$classroom = new Classroom();
$year = new Year();
$data_year = $year->getAllYear();

?>

<div class="classroom-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">
        
    <?php $form = ActiveForm::begin(); ?>
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

    <?= $form->field($model, 'id_classroom')->dropDownList(
                $classroom->getAllClassroom(),
                ['prompt'=>'--- Chọn lớp học ---']
            )?>

    <?= $form->field($model, 'id_student')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->checkBox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

