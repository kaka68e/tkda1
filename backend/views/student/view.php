<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = 'Học sinh mã: '.$model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Học Sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Thông tin '.$this->title;
?>
<div class="student-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Cập nhật', ['update', 'id' => $model->student_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->student_id], [
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
            'student_id',
            'student_name',
            [
                'attribute'=>'image',
                'format' => ['image',['width'=>'120','height'=>'120']],
                //'value'=>'../../'.$model->image,
                'value' => empty($model->image) ? '../../uploads/images/default/a1.jpg' : '../../'.$model->image
            ],

            'birthday',
            'sex',
            'disabilities',
            'id_nation',
            'parent_name',
            'address',
            'phone',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
