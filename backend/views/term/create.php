<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Term */

$this->title = 'Tạo mới Kỳ Học';
$this->params['breadcrumbs'][] = ['label' => 'Kỳ Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="term-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
