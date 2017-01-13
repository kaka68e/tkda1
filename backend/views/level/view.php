<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Level */

$this->title = $model->level_id;
$this->params['breadcrumbs'][] = ['label' => 'Trình Độ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->level_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->level_id], [
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
            'level_id',
            'level_name',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
