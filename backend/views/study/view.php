<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Study */

$this->title = 'Học sinh: '.$model->id_student.' - Lớp:'.$model->id_classroom.' - Kì:'.$model->id_term;
$this->params['breadcrumbs'][] = ['label' => 'Nhập Điểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="study-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student, 'id_subject' => $model->id_subject], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student, 'id_subject' => $model->id_subject], [
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
            'id_classroom',
            'id_term',
            'id_student',
            'id_subject',
            'result',
            'comment',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
