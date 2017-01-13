<?php 
use yii\helpers\Html;
use backend\models\Year;
use backend\models\Classroom;


$year = new Year();
$class = new Classroom();
$data_year = $year->getAllYear();
$data_class = $class->getAllClassroom();

$this->title = 'Thống kê KQ theo lớp';
 ?>
 <br>
 <h3>Thống kê kết quả học tập theo lớp:</h3>

 <br>
 <h5><strong>Chọn lớp cần xuất thông tin kết quả học tập:</strong></h5>
<br>
     <form class="form-inline">

        <div class="form-group">
            <p>

                <label for="">Chọn năm học : </label>
                <select class="form-control" style="width: 220px;margin-right: 20px;" id="select-year-studentclass3">
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
        </div>
        <div class="form-group">
             <p>
                <label for="">Chọn lớp học : </label>
                <?php 
                    echo Html::a('',['/classroom/getallalassroombyyear'],['id'=>'href'])
                 ?>
                <select class="form-control" style="width: 250px;margin-right: 20px;" id="study_class_filter2">
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
        <?php 
            echo Html::a('Xuất báo cáo',['report/resultreport1'],[
                'id'=>'thong-ke-diem-tong-ket-theo-lop',
                'class'=>'btn btn-info',
                'target'=>'_blank',
                'style'=>'margin-bottom: 10px;font-size: 12px;clear:both'
            ]);

         ?>
    </form>