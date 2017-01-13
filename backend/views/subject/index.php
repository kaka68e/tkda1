<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Block;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Môn Học';
$this->params['breadcrumbs'][] = $this->title;
$block = new Block();
?>
<div class="subject-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-default']) ?>
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

            // 'subject_id',
            // 'subject_name',
            // 'status',
            // 'created_at',
            // 'updated_at',
            [
                'attribute'=> 'subject_id',
                'headerOptions' => [
                    'style'=>'text-align:center',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            [
                'attribute'=> 'subject_name',
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
                'value'=>'idBlock.block_name',
                'filter' => $block->getAllBlock()
            ],

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
