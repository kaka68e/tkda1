<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Summary */

$this->title = 'Update Summary: ' . $model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Summaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_classroom, 'url' => ['view', 'id_classroom' => $model->id_classroom, 'id_student' => $model->id_student]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="summary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
