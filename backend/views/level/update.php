<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Level */

$this->title = 'Cập nhật Trình Độ: ' . $model->level_id;
$this->params['breadcrumbs'][] = ['label' => 'Trình Độ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->level_id, 'url' => ['view', 'id' => $model->level_id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="level-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
