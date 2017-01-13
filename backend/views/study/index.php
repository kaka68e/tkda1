<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Classroom;
use backend\models\Term;
use backend\models\Subject;
use backend\models\Student;
use backend\models\Year;
use backend\models\Block;
use yii\widgets\ActiveForm;




use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\StudySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nhập Điểm';
$this->params['breadcrumbs'][] = $this->title;
$subject = new Subject();
$year = new Year();
$class = new Classroom();
$data_year = $year->getAllYear();
$block = new Block();
$term = new Term();
$data_block = $block->getAllBlock();
$data_class = $class->getAllClassroom();
$data_term = $term->getAllTerm();
$data_subject = $subject->getAllSubject();

?>
<div class="study-index">

    <h3><?= Html::encode($this->title) ?> <small>(tổng <?php echo $dataProvider->totalCount; ?> bản ghi)</small></h3>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p style="float:left">
        <?= Html::a('Tạo mới <i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Nhập dữ liệu từ Excel  &nbsp;<i class="fa fa-file-text" aria-hidden="true"></i>', ['excel/create','controller'=>Yii::$app->controller->id], ['class' => 'btn btn-default']) ?>
        <button class="btn btn-default" id="button-img-help-study">Mẫu Excel mẫu &nbsp;<i class="fa fa-file-image-o" aria-hidden="true"></i></button>
        <?= Html::a('Tải lại dữ liệu <i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>', [''], ['class' => 'btn btn-default']) ?>

        <?php 
        $gridColumns = [
            'id_classroom',
            'id_term',
            'id_student',
            'id_subject',
            'result',
            'comment',
            'status',
        ];
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                 'columns' => $gridColumns
            ]);
         ?>

    </p>

    <h4 style="margin-top: 15px;">Tính Điểm Trung Bình <small>(tự động)</small></h4>
    <form class="form-inline">

        <div class="form-group">
            <p>

                <label for="">Chọn lớp : </label>
                <?php 
                    echo Html::a('',['/classroom/getallalassroombyyear'],['id'=>'href'])
                 ?>
                <select class="form-control" style="width: 220px;margin-right: 20px;" id="study_class_filter2">
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
        <div class="form-group">
             <p>
                <label for="">Chọn kì học : </label>
                <?php 
                    echo Html::a('',['/subject/getallsubjectbyblock'],['id'=>'href2'])
                 ?>
                <select class="form-control" style="width: 340px;margin-right: 20px;" id="select-term-study">
                <option value="">--- Chọn kì học ---</option>
                <?php 
                    foreach ($data_term as $key => $value) :
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
            echo Html::a('Tính điểm',['study/getaveragemark'],[
                'id'=>'tinh-diem-tu-dong',
                'class'=>'btn btn-info',
                'style'=>'margin-bottom: 10px;font-size: 12px;clear:both'
            ]);

         ?>
    </form>


    <h4 style="margin-top: 0px;">Tìm Kiếm Nhanh Dữ Liệu</h4>


    <p style="float:left;padding-right: 50px;margin-bottom: 0px;">

        <label for="">Chọn năm học để lấy danh sách các lớp được mở trong năm</label>
        <?php 
            echo Html::a('',['/classroom/getallalassroombyyear'],['id'=>'href'])
         ?>
        <select class="form-control" style="width:86%;" id="select-year-studentclass3">
        <option value="">--- Chọn năm học ---</option>
        <?php 
            foreach ($data_year as $key => $value) :
         ?>
          <option value="<?php echo $key ?>"><?php echo $value ?></option>
        <?php 
            endforeach;
         ?>
        </select>
    </p>
    
    <p style="margin-bottom: 0px;">
        <label for="">Chọn khối học để lấy danh sách các môn học tương ứng</label>
        <?php 
            echo Html::a('',['/subject/getallsubjectbyblock'],['id'=>'href2'])
         ?>
        <select class="form-control" style="width:36%;float:left;margin-right: 25px;" id="select-block-studentclass">
        <option value="">--- Chọn khối học ---</option>
        <?php 
            foreach ($data_block as $key => $value) :
         ?>
          <option value="<?php echo $key ?>"><?php echo $value ?></option>
        <?php 
            endforeach;
         ?>
        </select>  


        <select class="form-control" style="width:200px;" id="study_subject_filter">
        <option value="">--- Chọn môn học ---</option>
        <?php 
            foreach ($data_subject as $key => $value) :
         ?>
          <option value="<?php echo $key ?>"><?php echo $value ?></option>
        <?php 
            endforeach;
         ?>
        </select>
    </p>






  






    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //  ['class' => 'yii\grid\SerialColumn',
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

            //'id_classroom',

            [
                'attribute'=> 'id_classroom',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    if ($model->id_subject == 'TKHK1') {
                       return '<span style="color:#0000ff">'.$model->id_classroom.'</span>';
                    }
                    if ($model->id_subject == 'TKHK2') {
                        return '<span style="color:#d35400">'.$model->id_classroom.'</span>';
                    }
                    return $model->id_classroom;
                },
                // 'filter'=> Html::dropDownList('StudySearch[id_classroom]',null,$class->getAllClassroom(),['id'=>'study_class_filter','class'=>'form-control','prompt'=>'Chọn lớp học ---'])


                 'filter'=> Html::dropDownList('StudySearch[id_classroom]',null,$class->getAllClassroom(),['id'=>'study_class_filter','class'=>'form-control','prompt'=>'- Chọn lớp học ---'])
            ],

            [
                'attribute'=> 'id_student',
                'header'=>'Mã HS',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    if ($model->id_subject == 'TKHK1') {
                       return '<span style="color:#0000ff">'.$model->id_student.'</span>';
                    }
                    if ($model->id_subject == 'TKHK2') {
                        return '<span style="color:#d35400">'.$model->id_student.'</span>';
                    }
                    return $model->id_student;
                },
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
                    // if ($student_name) {
                    //     return $student_name->student_name;
                    // } else {
                    //     return 'Không rõ';
                    // }
                    if ($model->id_subject == 'TKHK1') {
                       return '<span style="color:#0000ff">'.$student_name->student_name.'</span>';
                    }
                    if ($model->id_subject == 'TKHK2') {
                        return '<span style="color:#d35400">'.$student_name->student_name.'</span>';
                    }
                    return $student_name->student_name;
                },
                'filter'=>false
            ],
            //'id_subject',
            //'result',
            [
                'attribute'=> 'id_subject',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    $subject_name = Subject::find()->where(['subject_id' => $model->id_subject])->one();
                    // if ($subject_name) {
                    //     return $subject_name->subject_name;
                    // } else {
                    //     return 'Không rõ';
                    // }
                    if ($model->id_subject == 'TKHK1') {
                       return '<span style="color:#0000ff">'.$subject_name->subject_name.'</span>';
                    }
                    if ($model->id_subject == 'TKHK2') {
                        return '<span style="color:#d35400">'.$subject_name->subject_name.'</span>';
                    }
                    return $subject_name->subject_name;
                },
                // 'filter'=> Html::dropDownList('StudySearch[id_subject]',null,$subject->getAllSubject(),['id'=>'study_subject_filter','class'=>'form-control','prompt'=>'--- Chọn môn học ---'])

                // 'filter'=> Html::dropDownList('StudySearch[id_subject]',null,$subject->getAllSubject(),['id'=>'study_subject_filter','class'=>'form-control','prompt'=>'- Chọn môn học ---'])
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
                    if ($model->id_term == 1) {
                        return '<span style="color:#0000ff">'.$term_name->term_name.'</span>';
                    }else{
                        return '<span style="color:#d35400">'.$term_name->term_name.'</span>';
                    }
                    
                },
                'filter'=>$term->getAllTerm()
            ],

            [
                'attribute'=> 'result',
                'headerOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'contentOptions' => [
                    'style'=>'text-align:center;vertical-align: middle;',
                ],
                'content' => function($model){
                    if ($model->id_subject == 'TKHK1') {
                        return '<span style="color:#0000ff">'.$model->result.'</span>';
                    }else if($model->id_subject == 'TKHK2'){
                        return '<span style="color:#d35400">'.$model->result.'</span>';
                    }
                    return $model->result;
                    
                },
            ],


            // 'comment',
            //  [
            //     'attribute'=> 'comment',
            //     'headerOptions' => [
            //         'style'=>'width:15px;text-align:center;vertical-align: middle',
            //     ],
            //     'contentOptions' => [
            //         'style'=>'width:15px;text-align:center;vertical-align: middle',
            //     ],
            // ],
            // 'status',
            // [
            //     'attribute'=> 'status',
            //     'headerOptions' => [
            //         'style'=>'text-align:center;vertical-align: middle;',
            //     ],
            //     'contentOptions' => [
            //         'style'=>'text-align:center;vertical-align: middle;',
            //     ],
            //     'content' => function($ketqua){
            //         if ($ketqua->status == 0) {
            //             return '<span class = "glyphicon glyphicon-remove fix-icon2" style="color:#c0392b"></span>';
            //         }else {
            //             return '<span class = "glyphicon glyphicon-ok fix-icon" style="color:#2ecc71"></span>';
            //         }
            //     },
            //     'filter' => ['1'=>'Kích hoạt','0'=>'Không kích hoạt']
            // ],
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
