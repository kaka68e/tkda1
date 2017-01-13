<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Conduct */

$this->title = 'Cập nhật Hạnh Kiểm: ' . $model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Hạnh Kiểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_classroom, 'url' => ['view', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="conduct-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
