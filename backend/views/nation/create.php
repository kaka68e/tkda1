<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Nation */

$this->title = 'Tạo mới Dân Tộc';
$this->params['breadcrumbs'][] = ['label' => 'Dân Tộc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
