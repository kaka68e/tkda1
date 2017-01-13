<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Year */

$this->title = 'Tạo mới Năm Học';
$this->params['breadcrumbs'][] = ['label' => 'Năm Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="year-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
