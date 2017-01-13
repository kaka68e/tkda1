<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Studentclass */

$this->title = 'Cập nhật Học Sinh trong Lớp: ' . $model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Lớp Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_classroom, 'url' => ['view', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="studentclass-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
