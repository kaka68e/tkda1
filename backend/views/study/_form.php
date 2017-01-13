<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Classroom;
use backend\models\Term;
use backend\models\Subject;

use backend\models\Year;
use backend\models\Block;


/* @var $this yii\web\View */
/* @var $model backend\models\Study */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
$classroom = new Classroom();
$year = new Year();
$subject = new Subject();
$block = new Block();
$data_year = $year->getAllYear();
$data_block = $block->getAllBlock();
?>

<div class="study-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'id_classroom')->dropDownList(
                $classroom->getAllClassroom(),
                ['prompt'=>'--- Chọn lớp học ---']
            )?>

            <?php $term = new Term(); ?>

            <?= $form->field($model, 'id_term')->dropDownList(
                $term->getAllTerm(),
                ['class'=>'bs-select form-control']
            ) ?>

            <?php 
                echo Html::a('',['/studentclass/getallstudentbyclassroom'],['id'=>'href3'])
             ?>

            <?= $form->field($model, 'id_student')->dropDownList(
                [],
                ['class'=>'bs-select form-control','prompt'=>'--- Chọn học sinh ---']
            ) ?>

            <?= $form->field($model, 'id_subject')->dropDownList(
                $subject->getAllSubject(),
                ['prompt'=>'--- Chọn môn học ---']
            )?>

            <?= $form->field($model, 'result')->textInput() ?>

            <?= $form->field($model, 'comment')->textArea(['maxlength' => true,'rows'=>6]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            
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

            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <?php 
                echo Html::a('',['/subject/getallsubjectbyblock2'],['id'=>'href2'])
             ?>
            <!-- <label for="">Chọn khối học để lấy danh sách các môn học tương ứng của khối</label>
            
            <select class="form-control" style="margin-bottom: 20px" id="select-block-studentclass">
            <option value="">--- Chọn khối học ---</option>
            <?php 
                foreach ($data_block as $key => $value) :
             ?>
              <option value="<?php //echo $key ?>"><?php //echo $value ?></option>
            <?php 
                endforeach;
             ?>
            </select> -->
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
