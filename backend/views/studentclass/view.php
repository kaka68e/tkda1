<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Studentclass */

$this->title = 'Lớp: '.$model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Lớp Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentclass-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student], [
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
            'id_student',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
