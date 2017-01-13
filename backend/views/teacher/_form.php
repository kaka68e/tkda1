<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Nation;
use backend\models\Level;

/* @var $this yii\web\View */
/* @var $model backend\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
$model->sex = 1;
$model->status = 1;
?>

<div class="teacher-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'teacher_id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'teacher_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'image')->textInput(['maxlength' => true,'id' => 'image','readonly'=>true]) ?>

            <div class="row">
                <div class="col-md-7">
                    <a href="#" id="select-img" class="btn btn-sm btn-success">Chọn ảnh</a>
                    <a href="#" id="delete-img" class="btn btn-sm btn-danger">Xóa ảnh</a>
                </div>
                <div class="col-md-5">
                    <img src="<?php if(!$model->image){echo '../../uploads/images/default/a1.jpg';} else{ echo '../../'.$model->image;} ?>" alt="" id = "show-img" style = "float:right;border:1px solid black;width:150px;height:150px">
                </div>
            </div>

            <?= $form->field($model, 'birthday')->textInput(['class'=>'form-control a1 a2','readonly'=>true]) ?>

            <?= $form->field($model, 'sex')->radioList(array('1'=>'Nam','0'=>'Nữ')) ?>

            <?php $nation = new Nation(); ?>

            <?= $form->field($model, 'id_nation')->dropDownList(
                $nation->getAllNation(),
                ['class'=>'bs-select form-control']
            ) ?>
            
            <?php $level = new Level(); ?>

            <?= $form->field($model, 'id_level')->dropDownList(
                $level->getAllLevel(),
                ['class'=>'bs-select form-control']
            ) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

    <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>