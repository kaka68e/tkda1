<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Block */

$this->title = 'Tạo mới Khối Học';
$this->params['breadcrumbs'][] = ['label' => 'Khối học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
