<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Summary */

$this->title = $model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="summary-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student], [
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
            'id_classroom',
            'id_student',
            'average_mark',
            'average_conduct',
            'rating',
            'confirm',
            'comment',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
