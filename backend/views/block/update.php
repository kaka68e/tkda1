<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Block */

$this->title = 'Cập nhật Khối Học: ' . $model->block_id;
$this->params['breadcrumbs'][] = ['label' => 'Khối Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->block_id, 'url' => ['view', 'id' => $model->block_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="block-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
