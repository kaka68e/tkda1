


<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Student;

use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Học Sinh';
$this->params['breadcrumbs'][] = 'Lí lịch '.$this->title;
?>
<?php 
// $count = count(Student::find()->all());
// echo(rand(10,100000000000));
 ?>
<h3>Kết quả tìm kiếm với từ khóa: <?php  echo Yii::$app->getRequest()->getQueryParam('name_student') ?> <small>(tổng <?php echo $dataProvider->totalCount; ?> kết quả)</small></h3>
<div class="student-index table-responsive">

    <!-- <h3><?= Html::encode($this->title) ?></h3> -->
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="float:left">
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', ['student/index'], ['class' => 'btn btn-default']) ?>
        <?php 
        $gridColumns = [
            'student_id',
            'student_name',
            'birthday',
            'sex',
            'disabilities',
            'id_nation',
            'parent_name',
            'address',
            'phone',
            'status',
        ];
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                 'columns' => $gridColumns
            ]);
         ?>
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
            // [
            //     'header' => 'Bản ghi số',
            //     'headerOptions' =>[
            //         'style'=>'text-align:center;vertical-align: middle;'
            //     ],
            //     'contentOptions' => [
            //         'style' => 'text-align:center;vertical-align: middle;',
            //     ],
            //     'content' => function ($model, $key, $index, $column) {
            //         if(\Yii::$app->request->get('page')){
            //             return $column->grid->dataProvider->totalCount -((Yii::$app->request->get('page')-1) * \Yii::$app->request->get('per-page')) - $index;
            //         } else{
            //             return $column->grid->dataProvider->totalCount - $index ;
            //         }
            //     }
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


            //'student_id',
            [
                'attribute'=> 'student_id',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            // 'student_id',
            // 'student_name',
            // 'birthday',
            // 'sex',
            // 'disabilities',
            // 'id_nation',
            // 'parent_name',
            // 'address',
            // 'phone',
            // 'image',
            // 'status',
            // 'created_at',
            // 'updated_at',
             [
                'attribute'=> 'student_name',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:left;vertical-align: middle;',
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
                'filter' => false
            ],
           // 'birthday',
            
            //'sex',
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
                        return "<span>Nam</span>";
                    } else {
                        return "<span>Nữ</span>";
                    }
                },
                'filter' => ['1'=>'Nam','0'=>'Nữ']
            ],
            //'disabilities',
            // 'id_nation',
            // 'parent_name',
            [
                'attribute'=> 'parent_name',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:left;vertical-align: middle;',
                ],
            ],

            // 'address',
            // [
            //     'attribute'=> 'address',
            //     'headerOptions' => [
            //         'style'=>'text-align:center;vertical-align: middle;',
            //     ],
            //     'contentOptions' => [
            //         'style'=>'text-align:left;vertical-align: middle;',
            //     ],
            // ],
            // 'phone',
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
                },
                'filter' => ['1'=>'Kích hoạt','0'=>'Không kích hoạt']
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
