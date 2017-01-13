

<?php 
use backend\models\Summary;
use backend\models\Student;
use backend\models\Year;
use backend\models\Classroom;

$this->title = 'Báo cáo';
$sum = new Summary();
 ?>


<h6 style="float: right;">Ngày in: <?php echo date('d-m-Y',time()) ?></h6>
<p style="text-align:center">	

<h5 style="text-transform: uppercase;">Trường Tiểu học Trâu Quỳ - Gia Lâm - Hà Nội</h5>

<h6 style="text-transform: uppercase;">Ban quản lí đào tạo</h6>
</p>
<p>
<h3 style="text-transform: uppercase;text-align: center;">Kết quả Học Tập lớp K85C</h3>
<h5 style="text-align: center;">Năm học :
<?php 
$class = Classroom::find()->asArray()->where(['status'=>1,'classroom_id'=>Yii::$app->getRequest()->getQueryParam('class_submit')])->one();
$year_name = Year::find()->asArray()->where(['status'=>1,'year_id'=>$class['id_year']])->one();
echo $year_name['year_name'];
 ?>

</h5>
</p>
<br>
<h5 style="font-weight:bold">Danh sách học sinh lên lớp: </h5>
<br>
<?php 

$sum_up = Summary::find()->asArray()->where(['status'=>1,'id_classroom'=>Yii::$app->getRequest()->getQueryParam('class_submit'),'confirm'=>1])->all();
$n = 1;
 ?>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align:center">STT</th>
				<th style="text-align:center">Mã học sinh</th>
				<th style="text-align:center">Tên học sinh</th>
				<th style="text-align:center">Điểm TB cả năm</th>
				<th style="text-align:center">Hạnh kiểm TB cả năm</th>
				<th style="text-align:center">Xếp loại học lực</th>
				<th style="text-align:center">Xác nhận</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		foreach ($sum_up as $item) :
		 ?>
			<tr>
				<td style="text-align:center"><?php echo $n++ ?></td>
				<td style="text-align:center"><?php echo $item['id_student'] ?></td>
				<td style="text-align:center">
					<?php 
						$name = Student::find()->where(['status'=>1,'student_id'=>$item['id_student']])->one();
						echo $name->student_name;
					 ?>
				</td>
				<td style="text-align:center"><?php echo $item['average_mark'] ?></td>
				<td style="text-align:center">
					<?php 
						if ($item['average_conduct'] == 1) {
                        echo '<span class = "" style="color:red">Suất sắc</span>';
                    } elseif ($item['average_conduct'] == 2) {
                        echo '<span class = "" style="color:#0000ff">Tốt</span>';
                    } elseif ($item['average_conduct'] == 3) {
                        echo '<span class = "" style="color:#cc00cc">Khá</span>';
                    } elseif ($item['average_conduct'] == 4) {
                        echo '<span class = "" style="color:#009933">Trung Bình</span>';
                    } elseif ($item['average_conduct'] == 5) {
                        echo 'Yếu';
                    }
					?>
				</td>
				<td style="text-align:center">
					<?php 
					if ($item['rating'] == 1) {
                        echo '<span class = "" style="color:red">Học lực Suất sắc</span>';
                    } elseif ($item['rating']  == 2) {
                        echo '<span class = "" style="color:#0000ff">Học lực Giỏi</span>';
                    } elseif ($item['rating'] == 3) {
                        echo '<span class = "" style="color:#cc00cc">Học lực Khá</span>';
                    } elseif ($item['rating']  == 4) {
                        echo '<span class = "" style="color:#009933">Học lực Trung Bình</span>';
                    } elseif ($item['rating']  == 5) {
                        echo 'Học lực Yếu';
                    }
					 ?>
				</td>
				<td style="text-align:center">
					<?php 
					if ($item['confirm'] == 0) {
                        echo '<span class = "" style="color:red">Bị đúp</span>';
                    }
                    echo '<span class = "" style="color:#0000ff">Lên lớp</span>';

					 ?>
				</td>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>



<h5 style="font-weight:bold">Danh sách học sinh ở lại lớp lớp: </h5>
<br>
<?php 
$sum_down = Summary::find()->asArray()->where(['status'=>1,'id_classroom'=>Yii::$app->getRequest()->getQueryParam('class_submit'),'confirm'=>0])->all();
$n = 1;
 ?>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="text-align:center">STT</th>
				<th style="text-align:center">Mã học sinh</th>
				<th style="text-align:center">Tên học sinh</th>
				<th style="text-align:center">Điểm TB cả năm</th>
				<th style="text-align:center">Hạnh kiểm TB cả năm</th>
				<th style="text-align:center">Xếp loại học lực</th>
				<th style="text-align:center">Xác nhận</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		foreach ($sum_down as $item) :
		 ?>
			<tr>
				<td style="text-align:center"><?php echo $n++ ?></td>
				<td style="text-align:center"><?php echo $item['id_student'] ?></td>
				<td style="text-align:center">
					<?php 
						$name = Student::find()->where(['status'=>1,'student_id'=>$item['id_student']])->one();
						echo $name->student_name;
					 ?>
				</td>
				<td style="text-align:center"><?php echo $item['average_mark'] ?></td>
				<td style="text-align:center">
					<?php 
						if ($item['average_conduct'] == 1) {
                        echo '<span class = "" style="color:red">Suất sắc</span>';
                    } elseif ($item['average_conduct'] == 2) {
                        echo '<span class = "" style="color:#0000ff">Tốt</span>';
                    } elseif ($item['average_conduct'] == 3) {
                        echo '<span class = "" style="color:#cc00cc">Khá</span>';
                    } elseif ($item['average_conduct'] == 4) {
                        echo '<span class = "" style="color:#009933">Trung Bình</span>';
                    } elseif ($item['average_conduct'] == 5) {
                        echo 'Yếu';
                    }
					?>
				</td>
				<td style="text-align:center">
					<?php 
					if ($item['rating'] == 1) {
                        echo '<span class = "" style="color:red">Học lực Suất sắc</span>';
                    } elseif ($item['rating']  == 2) {
                        echo '<span class = "" style="color:#0000ff">Học lực Giỏi</span>';
                    } elseif ($item['rating'] == 3) {
                        echo '<span class = "" style="color:#cc00cc">Học lực Khá</span>';
                    } elseif ($item['rating']  == 4) {
                        echo '<span class = "" style="color:#009933">Học lực Trung Bình</span>';
                    } elseif ($item['rating']  == 5) {
                        echo 'Học lực Yếu';
                    }
					 ?>
				</td>
				<td style="text-align:center">
					<?php 
					if ($item['confirm'] == 0) {
                        echo '<span class = "" style="color:red">Bị đúp</span>';
                    }else {
                    	echo '<span class = "" style="color:#0000ff">Lên lớp</span>';	
                    }


					 ?>
				</td>

			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php 
date_default_timezone_set("Asia/Bangkok");
 ?>
<p> Dữ liệu được cập nhật vào lúc : <?php echo date('h:i:s  d-m-Y',time()) ?></p>