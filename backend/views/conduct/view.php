<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Conduct */

$this->title = $model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Hạnh Kiểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conduct-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student], [
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
            'id_classroom',
            'id_term',
            'id_student',
            'rating',
            'comment',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
