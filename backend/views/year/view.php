<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Year */

$this->title = $model->year_id;
$this->params['breadcrumbs'][] = ['label' => 'Năm Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="year-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->year_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->year_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa không ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'year_id',
            'year_name',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
