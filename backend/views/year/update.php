<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Year */

$this->title = 'Cập nhật Năm Học: ' . $model->year_id;
$this->params['breadcrumbs'][] = ['label' => 'Năm Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->year_id, 'url' => ['view', 'id' => $model->year_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="year-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
