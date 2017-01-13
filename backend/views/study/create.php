<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Study */

$this->title = 'Tạo mới kết quả Học Tập';
$this->params['breadcrumbs'][] = ['label' => 'Nhập Điểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="study-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
