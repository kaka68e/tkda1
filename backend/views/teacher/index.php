<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Level;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Giáo Viên';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">

    <h3><?= Html::encode($this->title) ?> <small>(tổng <?php echo $dataProvider->totalCount; ?> bản ghi)</small></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', [''], ['class' => 'btn btn-default']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn',
            //     'header'=>'STT',
            //     'headerOptions' =>[
            //         'style'=>'color:#337db9;text-align:center;vertical-align: middle;'
            //     ],
            //     'contentOptions' => [
            //         'style' => 'text-align:center;vertical-align: middle;',
            //     ],
            // ],
            [
                'attribute'=> 'id',
                'header'=>'ID',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            // 'teacher_id',
            // 'teacher_name',
            // 'birthday',
            // 'sex',
            // 'id_nation',
            [
                'attribute'=> 'teacher_id',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],
            [
                'attribute'=> 'teacher_name',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            [
                'attribute' => 'birthday',
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    return Yii::$app->formatter->asDate($ketqua->birthday,'dd/MM/yyyy');
                },
                'filter' => Html::input('text',
                    'StudentSearch[birthday]','',['class'=>'form-control a1']
                ),
            ],

            [
                'attribute' => 'image',
                'format' => 'html',
                'label' => 'Hình ảnh',
                'value' => function ($data) {
                    if (!$data['image']) {
                        return Html::img('../../uploads/images/default/a1.jpg' ,['width' => '50px','class' => 'img-circle','height'=> '50px']);
                    } else {
                       return Html::img('../../' . $data['image'],['width' => '50px','class' => 'img-circle','height'=> '50px']); 
                    }  
                },
                'headerOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;vertical-align: middle;padding-top: 3px;padding-bottom: 3px;',
                ],
            ],

            [
                'attribute'=> 'sex',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model)
                {
                    if ($model->sex == 1) {
                        return "Nam";
                    } else {
                        return "Nữ";
                    }
                }
            ],

            [
                'attribute'=> 'id_level',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    $level_name = Level::find()->where(['level_id' => $model->id_level])->one();
                    if ($level_name) {
                        return $level_name->level_name;
                    } else {
                        return 'Không rõ';
                    }
                }
            ],
            
            
            
            
            // 'address',
            [
                'attribute'=> 'address',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            //'id_nation',

            // 'id_level',
            // 'address',
            // 'phone',
            // 'image',
            // 'status',
            // 'created_at',
            // 'updated_at',

            [
                'attribute'=> 'status',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
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
