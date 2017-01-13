<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Summary */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="summary-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_classroom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_student')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'average_mark')->textInput() ?>

    <?= $form->field($model, 'average_conduct')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput() ?>

    <?= $form->field($model, 'confirm')->textInput() ?>

    <?= $form->field($model, 'comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
