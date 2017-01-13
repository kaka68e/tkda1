<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = 'Cập nhật Học Sinh mã: ' . $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Học Sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'id' => $model->student_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="student-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
