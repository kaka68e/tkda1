<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Classroom */

$this->title = 'Cập nhật Lớp: ' . $model->classroom_id;
$this->params['breadcrumbs'][] = ['label' => 'Lớp Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->classroom_id, 'url' => ['view', 'id' => $model->classroom_id]];
$this->params['breadcrumbs'][] = 'Cật nhật';
?>
<div class="classroom-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
