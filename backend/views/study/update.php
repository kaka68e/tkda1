<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Study */

$this->title = 'Update Study: ' . $model->id_classroom;
$this->params['breadcrumbs'][] = ['label' => 'Studies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_classroom, 'url' => ['view', 'id_classroom' => $model->id_classroom, 'id_term' => $model->id_term, 'id_student' => $model->id_student, 'id_subject' => $model->id_subject]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="study-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
