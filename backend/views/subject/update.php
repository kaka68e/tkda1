<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = 'Cập nhật Môn Học: ' . $model->subject_id;
$this->params['breadcrumbs'][] = ['label' => 'Môn Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->subject_id, 'url' => ['view', 'id' => $model->subject_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
