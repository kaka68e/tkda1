<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Studentclass */

$this->title = 'Thêm mới Học Sinh vào Lớp';
$this->params['breadcrumbs'][] = ['label' => 'Lớp Học', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentclass-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
