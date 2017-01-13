<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Excel */

$this->title = $model->excel_id;
$this->params['breadcrumbs'][] = ['label' => 'Excels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excel-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->excel_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->excel_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'excel_id',
            'excel_name',
            'excel_category',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
