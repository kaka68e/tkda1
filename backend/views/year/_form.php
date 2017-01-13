<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Year */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
?>

<div class="year-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'year_id')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'year_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>

</div>
