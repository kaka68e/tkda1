<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Teacherclass */

$this->title = 'Cập nhật phân lớp giảng dạy: ' . $model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Phân lớp giảng dạy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_classroom, 'url' => ['view', 'id_classroom' => $model->id_classroom, 'id_teacher' => $model->id_teacher]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="teacherclass-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
