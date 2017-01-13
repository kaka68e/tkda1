<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Nation */

$this->title = $model->nation_id;
$this->params['breadcrumbs'][] = ['label' => 'Dân Tộc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->nation_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->nation_id], [
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
            'nation_id',
            'nation_name',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
