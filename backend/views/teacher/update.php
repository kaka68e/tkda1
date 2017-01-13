<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Teacher */

$this->title = 'Cập nhật Giáo Viên: ' . $model->teacher_id;
$this->params['breadcrumbs'][] = ['label' => 'Giáo Viên', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->teacher_id, 'url' => ['view', 'id' => $model->teacher_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="teacher-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
