<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = 'Tạo mới Môn Học';
$this->params['breadcrumbs'][] = ['label' => 'Môn Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
