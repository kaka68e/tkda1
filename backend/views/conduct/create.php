<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Conduct */

$this->title = 'Tạo mới Hạnh Kiểm';
$this->params['breadcrumbs'][] = ['label' => 'Hạnh Kiểm', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conduct-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
