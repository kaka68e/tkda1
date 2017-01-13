<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Block;
use backend\models\Year;

/* @var $this yii\web\View */
/* @var $model backend\models\Classroom */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
?>

<div class="classroom-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

    <?php $form = ActiveForm::begin(); ?>

    <?php $block = new Block(); ?>

    <?php $year = new Year(); ?>

    <?= $form->field($model, 'classroom_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_year')->dropDownList(
        $year->getAllYear(),
        ['class'=>'bs-select form-control']
    ) ?>

    <?= $form->field($model, 'id_block')->dropDownList(
        $block->getAllBlock(),
        ['class'=>'bs-select form-control']
    ) ?>

    <?= $form->field($model, 'status')->checkBox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
