<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Excel */

$this->title = 'Update Excel: ' . $model->excel_id;
$this->params['breadcrumbs'][] = ['label' => 'Excels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->excel_id, 'url' => ['view', 'id' => $model->excel_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="excel-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
