<?php
use backend\models\Teacher;
use backend\models\Student;
use backend\models\Classroom;
/* @var $this yii\web\View */

$this->title = 'Trang chủ';
?>
<div class="site-index">

<div class="bg-light lter b-b wrapper-md">
      <div class="row">
        <div class="col-sm-6 col-xs-12">
          <h1 class="m-n font-thin h3 text-black" style="margin-bottom: 10px!important;">Trang chủ</h1>
          <small class="text-muted">Chào mừng đến với phần mềm quản lý học sinh tiểu học Trâu Quỳ - Gia Lâm</small>
        </div>
      </div>
</div>
<br>
<h4 style="margin-left: 20px;color:#23b7e5">Dữ liệu phần mềm đang quản lý gồm có: </h4>
<br>
<div class="row row-sm text-center">
	<div class="col-xs-6">
		<div class="panel padder-v item">
			<div class="h1 text-info font-thin h1">
				
				<?php 
					$teacher = count(Student::find()->all());
					echo $teacher;
				 ?>
			</div>
			<span class="text-muted text-xs">Học sinh</span>
			<div class="top text-right w-full">
				<i class="fa fa-caret-down text-warning m-r-sm"></i>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="panel padder-v item">
			<div class="h1 text-info font-thin h1">
				
				<?php 
					$teacher = count(Teacher::find()->all());
					echo $teacher;
				 ?>
			</div>
			<span class="text-muted text-xs">Giáo viên</span>
			<div class="top text-right w-full">
				<i class="fa fa-caret-down text-warning m-r-sm"></i>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="panel padder-v item">
			<div class="h1 text-info font-thin h1">
				<?php 
					$teacher = count(Classroom::find()->all());
					echo $teacher;
				 ?>
			</div>
			<span class="text-muted text-xs">Lớp học</span>
			<div class="top text-right w-full">
				<i class="fa fa-caret-down text-warning m-r-sm"></i>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="panel padder-v item">
			<div class="h1 text-info font-thin h1">25</div>
			<span class="text-muted text-xs">Bản ghi mới</span>
			<div class="top text-right w-full">
				<i class="fa fa-caret-down text-warning m-r-sm"></i>
			</div>
		</div>
	</div>
</div>