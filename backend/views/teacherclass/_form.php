<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Teacherclass */
/* @var $form yii\widgets\ActiveForm */
$model->status = 1;
?>

<div class="studentclass-form">
    <div class="row">
        <div class="col-md-5 col-sm-8">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'id_classroom')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'id_teacher')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->checkBox() ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

