<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Excel */

$get = Yii::$app->request->get('controller');
$get2 ='index.php?r='.$get;
$this->title = 'Nhập dữ liệu cho bảng: '.$get;
$this->params['breadcrumbs'][] = ['label' => $get, 'url' => $get2];
$this->params['breadcrumbs'][] = ['label' => 'Excels', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="excel-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
