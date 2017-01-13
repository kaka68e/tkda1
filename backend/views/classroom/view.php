<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Classroom */

$this->title = 'Lớp: '.$model->classroom_id;
$this->params['breadcrumbs'][] = ['label' => 'Lớp Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classroom-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->classroom_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->classroom_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Bạn có chắc muốn xóa không?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'classroom_id',
            'id_year',
            'id_block',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
