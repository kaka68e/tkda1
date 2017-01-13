<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Teacherclass */

$this->title = 'Phân lớp cho Giáo Viên giảng dạy';
$this->params['breadcrumbs'][] = ['label' => 'Phân lớp giảng dạy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacherclass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
