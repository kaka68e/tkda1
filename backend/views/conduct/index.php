<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Term;
use backend\models\Student;
use backend\models\Year;
use backend\models\Classroom;


$term = new Term();
$class = new Classroom();

$year = new Year();
$data_year = $year->getAllYear();


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ConductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hạnh Kiểm';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conduct-index">

    <h3><?= Html::encode($this->title) ?> <small>(tổng <?php echo $dataProvider->totalCount; ?> bản ghi)</small></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Nhập dữ liệu từ Excel  &nbsp;<i class="fa fa-file-text" aria-hidden="true"></i>', ['excel/create','controller'=>Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
        <button class="btn btn-default" id="button-img-help">Mẫu Excel mẫu &nbsp;<i class="fa fa-file-image-o" aria-hidden="true"></i></button>
      
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', [''], ['class' => 'btn btn-default']) ?>
    </p>

    <label for="">Chọn năm học để lấy danh sách các lớp được mở trong năm</label>
    <?php 
        echo Html::a('',['/classroom/getallalassroombyyear'],['id'=>'href'])
     ?>
    <select class="form-control" style="margin-bottom: 20px;width:40%" id="select-year-studentclass2">
    <option value="">--- Chọn năm học ---</option>
    <?php 
        foreach ($data_year as $key => $value) :
     ?>
      <option value="<?php echo $key ?>"><?php echo $value ?></option>
    <?php 
        endforeach;
     ?>
    </select>




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
            // 'id',
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
            // 'id_term',
            // 'id_student',
            [
                'attribute'=> 'id_classroom',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'filter'=> Html::dropDownList('StudentclassSearch[id_classroom]',null,$class->getAllClassroom(),['id'=>'student_class_filter','class'=>'form-control','prompt'=>'Chọn lớp học ---'])

            ],

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
                'header'=>'Tên học sinh',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    $student_name = Student::find()->where(['student_id' => $model->id_student])->one();
                    if ($student_name) {
                        return $student_name->student_name;
                    } else {
                        return 'Không rõ';
                    }
                },
                'filter'=>false
            ],

            [
                'attribute'=> 'id_term',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    $term_name = Term::find()->where(['term_id' => $model->id_term])->one();
                    // if ($term_name) {
                    //     return $term_name->term_name;
                    // } else {
                    //     return 'Không rõ';
                    // }
                    if ($model->id_term == 1) {
                        return '<span style="color:#0000ff">'.$term_name->term_name.'</span>';
                    }else{
                        return '<span style="color:#d35400">'.$term_name->term_name.'</span>';
                    }
                },
                'filter'=>$term->getAllTerm()
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
                        return '<span class = "" style="color:red">Suất sắc</span>';
                    } elseif ($ketqua->rating == 2) {
                        return '<span class = "" style="color:#0000ff">Tốt</span>';
                    } elseif ($ketqua->rating == 3) {
                        return '<span class = "" style="color:#cc00cc">Khá</span>';
                    } elseif ($ketqua->rating == 4) {
                        return '<span class = "" style="color:#009933">Trung Bình</span>';
                    } elseif ($ketqua->rating == 5) {
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
           // 'status',
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
            //'comment',
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
            ],
        ],
    ]); ?>
</div>
