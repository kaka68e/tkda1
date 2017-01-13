<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Block;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
$block = new Block();
?>

<div class="subject-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'subject_id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_block')->dropDownList(
                $block->getAllBlock(),
                ['class'=>'bs-select form-control','prompt'=>'--- Chọn khối học ---']
            ) ?>
            <?= $form->field($model, 'status')->checkBox() ?>


            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

    <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
