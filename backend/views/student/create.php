<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Student */

$this->title = 'Tạo mới Học Sinh';
$this->params['breadcrumbs'][] = ['label' => 'Học Sinh', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
