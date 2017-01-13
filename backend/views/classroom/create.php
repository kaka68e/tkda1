<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Classroom */

$this->title = 'Tạo mới Lớp Học';
$this->params['breadcrumbs'][] = ['label' => 'Lớp Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classroom-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
