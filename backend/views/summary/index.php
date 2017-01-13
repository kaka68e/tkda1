<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Classroom;
use backend\models\Year;
use backend\models\Student;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SummarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tổng Kết';
$this->params['breadcrumbs'][] = $this->title;



$year = new Year();
$class = new Classroom();
$data_year = $year->getAllYear();
$data_class = $class->getAllClassroom();
?>
<div class="summary-index">

    <h3><?= Html::encode($this->title) ?> <small>(tổng <?php echo $dataProvider->totalCount; ?> bản ghi)</small></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <!--  <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Nhập dữ liệu từ Excel  &nbsp;<i class="fa fa-file-text" aria-hidden="true"></i>', ['excel/create','controller'=>Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
        <button class="btn btn-default" id="button-img-help">Mẫu Excel mẫu &nbsp;<i class="fa fa-file-image-o" aria-hidden="true"></i></button> -->
      
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', [''], ['class' => 'btn btn-default']) ?>
    </p>

    <h4 style="margin-top: 15px;">Tính Kết Quả Tổng Kết Cả Năm <small>(tự động)</small></h4>
        <form class="form-inline">

        <div class="form-group">
            <p>

                <label for="">Chọn năm học : </label>
                <?php 
                    echo Html::a('',['/classroom/getallalassroombyyear'],['id'=>'href'])
                 ?>
                <select class="form-control" style="width: 220px;margin-right: 20px;" id="select-year-studentclass3">
                <option value="">--- Chọn năm học học ---</option>
                <?php 
                    foreach ($data_year as $key => $value) :
                 ?>
                  <option value="<?php echo $key ?>"><?php echo $value ?></option>
                <?php 
                    endforeach;
                 ?>
                </select>
            </p>
        </div>
        <div class="form-group">
             <p>
                <label for="">Chọn lớp học : </label>
                <?php 
                    echo Html::a('',['/subject/getallsubjectbyblock'],['id'=>'href2'])
                 ?>
                <select class="form-control" style="width: 230px;margin-right: 20px;" id="study_class_filter2">
                <option value="">--- Chọn lớp học ---</option>
                <?php 
                    foreach ($data_class as $key => $value) :
                 ?>
                  <option value="<?php echo $key ?>"><?php echo $value ?></option>
                <?php 
                    endforeach;
                 ?>
                </select>
            </p>
        </div>
        <!-- <button type="submit" class="btn btn-info" style="margin-bottom: 10px;font-size: 12px;clear:both">Tính điểm</button> -->
        <?php 
            echo Html::a('Tính tổng kết cả năm',['summary/getsummary'],[
                'id'=>'tinh-tong-ket-ca-nam',
                'class'=>'btn btn-info',
                'style'=>'margin-bottom: 10px;font-size: 12px;clear:both'
            ]);

         ?>
    </form>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
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

            // 'id_classroom',
            [
                'attribute'=> 'id_classroom',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            // 'id_student',
            [
                'attribute'=> 'id_student',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            [
                'attribute'=> 'id_student',
                'header'=>'Tên HS',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    $student_name = Student::find()->where(['student_id' => $model->id_student])->one();
                    return $student_name->student_name;
                },
                'filter'=>false
            ],


            // 'average_mark',
            [
                'attribute'=> 'average_mark',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
            ],

            [
                'attribute'=> 'rating',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    if ($ketqua->rating == 1) {
                        return '<span class = "" style="color:red">Học lực Suất sắc</span>';
                    } elseif ($ketqua->rating == 2) {
                        return '<span class = "" style="color:#0000ff">Học lực Giỏi</span>';
                    } elseif ($ketqua->rating == 3) {
                        return '<span class = "" style="color:#cc00cc">Học lực Khá</span>';
                    } elseif ($ketqua->rating == 4) {
                        return '<span class = "" style="color:#009933">Học lực Trung Bình</span>';
                    } elseif ($ketqua->rating == 5) {
                        return 'Học lực Yếu';
                    }
                },
                'filter' => [
                    '1' => 'Suất sắc',
                    '2' => 'Giỏi',
                    '3' => 'Khá',
                    '4' => 'Trung Bình',
                    '5' => 'Yếu',
                ]
            ],


            // 'average_conduct',
            [
                'attribute'=> 'average_conduct',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($ketqua){
                    if ($ketqua->average_conduct == 1) {
                        return '<span class = "" style="color:red">Suất sắc</span>';
                    } elseif ($ketqua->average_conduct == 2) {
                        return '<span class = "" style="color:#0000ff">Tốt</span>';
                    } elseif ($ketqua->average_conduct == 3) {
                        return '<span class = "" style="color:#cc00cc">Khá</span>';
                    } elseif ($ketqua->average_conduct == 4) {
                        return '<span class = "" style="color:#009933">Trung Bình</span>';
                    } elseif ($ketqua->average_conduct == 5) {
                        return 'Yếu';
                    }
                },
                'filter' => [
                    '1' => 'Suất sắc',
                    '2' => 'Tốt',
                    '3' => 'Khá',
                    '4' => 'Trung Bình',
                    '5' => 'Yếu',
                ]
            ],


            


            // 'confirm',
            [
                'attribute'=> 'confirm',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    if ($model->confirm == 0) {
                        return '<span class = "" style="color:red">Bị đúp</span>';
                    }
                    return '<span class = "" style="color:#0000ff">Lên lớp</span>';
                }
            ],
            // 'comment',
            // 'status',
            // 'created_at',
            // 'updated_at',

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
            ]
        ],
    ]); ?>
</div>
