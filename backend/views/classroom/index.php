<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Block;
use backend\models\Year;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ClassroomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lớp Học';
$this->params['breadcrumbs'][] = $this->title;
$block = new Block();
$year = new Year();
?>
<div class="classroom-index">

    <h3><?= Html::encode($this->title) ?> <small>(tổng <?php echo $dataProvider->totalCount; ?> bản ghi)</small></h3>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Nhập dữ liệu từ Excel  &nbsp;<i class="fa fa-file-text" aria-hidden="true"></i>', ['excel/create','controller'=>Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', [''], ['class' => 'btn btn-default']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn',
                'header'=>'STT',
                'headerOptions' =>[
                    'style'=>'color:#337db9;text-align:center'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
            ],
            // 'classroom_id',
            // 'id_year',
            // 'id_block',
            // 'status',
            // 'created_at',
            // 'updated_at',
            [
                'attribute'=> 'classroom_id',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            [
                'attribute'=> 'id_block',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model)
                {
                    $block_name = Block::find()->where(['block_id' => $model->id_block])->one();
                    if ($block_name) {
                        return $block_name->block_name;
                    } else {
                        return 'Không rõ';
                    }
                },
                'filter' => $block->getAllBlock()
            ],

             [
                'attribute'=> 'id_year',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model)
                {
                    $year_name = Year::find()->where(['year_id' => $model->id_year])->one();
                    if ($year_name) {
                        return $year_name->year_name;
                    } else {
                        return 'Không rõ';
                    }
                },
                'filter' => $year->getAllYear()
            ],

            //'status',
            [
                'attribute'=> 'status',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    if ($ketqua->status == 0) {
                        return '<span class = "glyphicon glyphicon-remove fix-icon2" style="color:#c0392b"></span>';
                    }else {
                        return '<span class = "glyphicon glyphicon-ok fix-icon" style="color:#2ecc71"></span>';
                    }
                }
            ],
            //'created_at',
            [
                'attribute' => 'created_at',
                'headerOptions' => [
                    'style' => 'text-align:center',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    return date('d-m-Y',$ketqua->created_at);
                }
            ],
            // 'updated_at',
             [
                'attribute' => 'updated_at',
                'headerOptions' => [
                    'style' => 'text-align:center',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    return date('d-m-Y',$ketqua->created_at);
                }
            ],

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Hành động',
                'headerOptions' =>[
                    'style'=>'color:#337db9;text-align:center;vertical-align: middle;'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'buttons'=>[
                    'view' => function($url,$model){
                        return Html::a('<i class="fa fa-search"></i> Xem',$url,['class'=>'btn btn-circle btn-xs btn-primary','title' => 'Xem chi tiết']);
                    },

                    'update' => function($url,$model){
                        return Html::a('<i class="fa fa-edit"></i> Sửa',$url,['class'=>'btn btn-circle btn-xs btn-success','title' => 'Sửa']);
                    },

                    'delete' => function($url,$model){
                        return Html::a('<i class="fa fa-times"></i> Xóa',$url,
                            [
                                'class'=>'btn btn-circle btn-xs btn-danger',
                                'title' => 'Xóa',
                                'data-confirm' =>'Bạn có chắc muốn xóa không ?',
                                'data-method'=>'post'
                            ]
                        );
                    },
                ]
            ],
        ],
    ]); ?>
</div>
