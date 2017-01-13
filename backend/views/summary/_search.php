<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SummarySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="summary-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_classroom') ?>

    <?= $form->field($model, 'id_student') ?>

    <?= $form->field($model, 'average_mark') ?>

    <?= $form->field($model, 'average_conduct') ?>

    <?= $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'confirm') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
