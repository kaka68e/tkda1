<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Term */

$this->title = 'Cập nhật Kỳ Học: ' . $model->term_id;
$this->params['breadcrumbs'][] = ['label' => 'Kỳ Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->term_id, 'url' => ['view', 'id' => $model->term_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="term-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
