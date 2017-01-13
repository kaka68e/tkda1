<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Nation */

$this->title = 'Cập nhật Dân Tộc: ' . $model->nation_id;
$this->params['breadcrumbs'][] = ['label' => 'Dân Tộc', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nation_id, 'url' => ['view', 'id' => $model->nation_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="nation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
