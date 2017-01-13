

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use backend\models\Nation;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */
/* @var $form yii\widgets\ActiveForm */

$model->sex = 1;
$model->status = 1;
?>

<div class="student-form">
   <?php $form = ActiveForm::begin([
        // 'enableAjaxValidation' => true,
    ]); ?>
    <div class="row">
        <div class="col-md-5 col-sm-8">

           

            <?= $form->field($model, 'student_id')->textInput(['maxlength' => true,'readonly'=>true]) ?>


            <?= $form->field($model, 'student_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'image')->textInput(['maxlength' => true,'id' => 'image','readonly'=>true]) ?>

            <div class="row">
                <div class="col-md-7">
                    <span id="select-img" class="btn btn-sm btn-primary">Chọn ảnh</span>
                    <a href="#" id="delete-img" class="btn btn-sm btn-danger">Xóa ảnh</a>
                </div>
                <div class="col-md-5">
                    <img src="<?php if(!$model->image){echo '../../uploads/images/default/a1.jpg';} else{ echo '../../'.$model->image;} ?>" alt="" id = "show-img" style = "float:right;border:1px solid #fff;width:150px;height:150px">
                </div>
            </div>


            <?= $form->field($model, 'birthday')->textInput(['class'=>'form-control a1','readonly'=>true]) ?>
            
        </div>   
        <div class="col-md-5 col-sm-8">

            <?php $nation = new Nation(); ?>
            <?= $form->field($model, 'disabilities')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'sex')->radioList(array('1'=>'Nam','0'=>'Nữ')) ?>

            <?= $form->field($model, 'id_nation')->dropDownList(
                $nation->getAllNation(),
                ['class'=>'bs-select form-control']
            ) ?>

            <?= $form->field($model, 'parent_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>
            
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
