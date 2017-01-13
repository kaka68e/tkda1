<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Level */

$this->title = 'Tạo mới Trình Độ';
$this->params['breadcrumbs'][] = ['label' => 'Trình Độ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="level-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
