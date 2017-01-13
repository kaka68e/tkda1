<?php 
use yii\helpers\Html;
$control = Yii::$app->controller->id;


 ?>
<aside id="aside" class="app-aside hidden-xs bg-dark">
	<div class="aside-wrap">
		<div class="navi-wrap">
			<!-- user -->
			<div class="clearfix hidden-xs text-center hide" id="aside-user">
				<div class="dropdown wrapper">
					<a href="app.page.html">
						<span class="thumb-lg w-auto-folded avatar m-t-sm">
							<img src="img/a0.jpg" class="img-full" alt="...">
						</span>
					</a>
					<a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
						<span class="clear">
							<span class="block m-t-sm">
								<strong class="font-bold text-lt">John.Smith</strong> 
								<b class="caret"></b>
							</span>
							<span class="text-muted text-xs block">Art Director</span>
						</span>
					</a>
					<!-- dropdown -->
					<ul class="dropdown-menu animated fadeInRight w hidden-folded">
						<li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
							<span class="arrow top hidden-folded arrow-info"></span>
							<div>
								<p>300mb of 500mb used</p>
							</div>
							<div class="progress progress-xs m-b-none dker">
								<div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
							</div>
						</li>
						<li>
							<a href="">Settings</a>
						</li>
						<li>
							<a href="page_profile.html">Profile</a>
						</li>
						<li>
							<a href="">
								<span class="badge bg-danger pull-right">3</span>
								Notifications
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="page_signin.html">Logout</a>
						</li>
					</ul>
					<!-- / dropdown -->
				</div>
				<div class="line dk hidden-folded"></div>
			</div>
			<!-- / user -->

			<!-- nav -->
			<nav ui-nav="" class="navi clearfix">
				<ul class="nav">
					<li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
						<span>Điều hướng</span>
					</li>
					<li>
						<a href="<?php echo Yii::$app->homeUrl ?>?r=site%2Findex" class="auto">      
							<span class="pull-right text-muted">
								<i class="fa fa-fw fa-angle-right text"></i>
								<i class="fa fa-fw fa-angle-down text-active"></i>
							</span>
							<i class="glyphicon glyphicon-stats icon text-primary-dker" style="margin-top:-13px"></i>
							<span class="font-bold">Trang chủ</span>
								<?php 
								 Html::a('<span class="font-bold">Trang chủ</span>',['site/index'],[
									'style'=>'bottom: 10px;left: 0px;padding-top: 0px;padding-bottom: 0px;padding-bottom: 10px;'
								]);
							 ?>
						</a>
					<!-- 	<ul class="nav nav-sub dk">
							<li class="nav-sub-header">
								<a href="">
									<span>Dashboard</span>
								</a>
							</li>
							<li>
								<a href="index-2.html">
									<span>Dashboard v1</span>
								</a>
							</li>
							<li>
								<a href="dashboard.html">
									<b class="label bg-info pull-right">N</b>
									<span>Dashboard v2</span>
								</a>
							</li>
						</ul> -->
					</li>
					<li class="line dk"></li>

					<li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
						<span>Thành phần</span>
					</li>
					<li class="active">
						<a href="" class="auto" style=" background-color: #e74c3c;font-weight:bold">      
							<span class="pull-right text-muted">
								<i class="fa fa-fw fa-angle-right text"></i>
								<i class="fa fa-fw fa-angle-down text-active" style="color:#fff;font-weight:bold;"></i>
							</span>
							<!-- <b class="badge bg-info pull-right">6</b> -->
							<i class="glyphicon glyphicon-briefcase icon" style="margin-top:-13px"></i>
							<span>Học Sinh</span>
						</a>
						<ul class="nav nav-sub dk">
							<li class="nav-sub-header">
								 <?php echo Html::a('<i class="fa fa-child" aria-hidden="true"></i> QL Lý Lịch Học Sinh',['/student'],['class'=>'nav-link']) ?>
							</li>
							<li>
								<?php echo Html::a('<span><i class="fa fa-child" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Lí lịch học sinh</span>',['/student'],['class'=> ($control == 'student') ? 'active-xanh' : '']) ?>
							</li>
							<li <?php ($control == 'classroom') ? 'class=active-xanh' : '' ?>>
                                <?php echo Html::a('<span><i class="fa fa-building-o" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Danh sách lớp học</span>',['/classroom'],['class'=> ($control == 'classroom') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-random" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Xếp lớp học sinh</span>',['/studentclass'],['class'=> ($control == 'studentclass') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-users" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Nhập điểm</span>',['/study'],['class'=> ($control == 'study') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-line-chart" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Hạnh kiểm</span>',['/conduct'],['class'=> ($control == 'conduct') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-check-circle" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Tổng kết</span>',['/summary'],['class'=> ($control == 'summary') ? 'active-xanh' : '']) ?>
							</li>  

						</ul>
					</li>


					<li class="active">
						<a href="" class="auto" style=" background-color: #e74c3c;font-weight:bold">      
							<span class="pull-right text-muted">
								<i class="fa fa-fw fa-angle-right text"></i>
								<i class="fa fa-fw fa-angle-down text-active" style="color:#fff;font-weight:bold;"></i>
							</span>
							<!-- <b class="badge bg-info pull-right">6</b> -->
							<i class="glyphicon glyphicon-list" style="margin-top:-13px"></i>
							<span>Danh Mục</span>
						</a>
						<ul class="nav nav-sub dk">
							<li class="nav-sub-header">
								 <?php echo Html::a('<i class="fa fa-child" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> QL Lý Lịch Học Sinh',['/student'],['class'=>'nav-link']) ?>
							</li>
							<li>
								<?php echo Html::a('<span><i class="fa fa-database" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Khối học</span>',['/block'],['class'=> ($control == 'block') ? 'active-xanh' : '']) ?>
							</li>
							<li <?php ($control == 'classroom') ? 'class=active-xanh' : '' ?>>
                                <?php echo Html::a('<span><i class="fa fa-calendar-plus-o" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Kì học</span>',['/term'],['class'=> ($control == 'term') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-calendar" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Năm học</span>',['/year'],['class'=> ($control == 'year') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-book" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Môn học</span>',['/subject'],['class'=> ($control == 'subject') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-university" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Dân tộc</span>',['/nation'],['class'=> ($control == 'nation') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-universal-access" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Trình độ</span>',['/level'],['class'=> ($control == 'level') ? 'active-xanh' : '']) ?>
							</li>
						</ul>
					</li>


					<li class="active">
						<a href="" class="auto" style=" background-color: #e74c3c;font-weight:bold">      
							<span class="pull-right text-muted">
								<i class="fa fa-fw fa-angle-right text"></i>
								<i class="fa fa-fw fa-angle-down text-active" style="color:#fff;font-weight:bold"></i>
							</span>
							<!-- <b class="badge bg-info pull-right">2</b> -->
							<i class="fa fa-users" style="margin-top:-13px"></i>
							<span>Giáo Viên</span>
						</a>
						<ul class="nav nav-sub dk">
							<li class="nav-sub-header">
	
							</li>
							<li>
								<?php echo Html::a('<span><i class="fa fa-user-secret" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Lý lịch giáo viên</span>',['/teacher'],['class'=> ($control == 'teacher') ? 'active-xanh' : '']) ?>
							</li>
							<li>
                                <?php echo Html::a('<span><i class="fa fa-random" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Lớp giáo viên dạy</span>',['/teacherclass'],['class'=> ($control == 'teacherclass') ? 'active-xanh' : '']) ?>
							</li>
						</ul>
					</li>

					<li class="active">
						<a href="" class="auto" style=" background-color: #e74c3c;font-weight:bold">      
							<span class="pull-right text-muted">
								<i class="fa fa-fw fa-angle-right text"></i>
								<i class="fa fa-fw fa-angle-down text-active" style="color:#fff;font-weight:bold"></i>
							</span>
							<!-- <b class="badge bg-info pull-right">2</b> -->
							<i class="fa fa-cloud-upload" style="margin-top:-13px"></i>
							<span>Upload</span>
						</a>
						<ul class="nav nav-sub dk">
							<li class="nav-sub-header">
			
							</li>
							<li>
								<?php echo Html::a('<span><i class="fa fa-file-image-o" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Mẫu Excel mẫu</span>',['/excel/image'],['class'=>'nav-link']) ?>
							</li>
							<li>
								<?php echo Html::a('<span><i class="fa fa-file-excel-o" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Quản lý File Excel</span>',['/excel'],['class'=>'nav-link']) ?>
							</li>
							<li>
								<?php echo Html::a('<span><i class="fa fa-file-image-o" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i>Quản lý Hình ảnh</span>',['/file'],['class'=>'nav-link']) ?>
							</li>
						</ul>
					</li>


					<li class="active">
						<a href="" class="auto" style=" background-color: #e74c3c;font-weight:bold">      
							<span class="pull-right text-muted">
								<i class="fa fa-fw fa-angle-right text"></i>
								<i class="fa fa-fw fa-angle-down text-active" style="color:#fff;font-weight:bold"></i>
							</span>
							<!-- <b class="badge bg-info pull-right">2</b> -->
							<i class="glyphicon glyphicon-signal" style="margin-top:-13px"></i>
							<span>Báo Cáo</span>
						</a>
						<ul class="nav nav-sub dk">
							<li class="nav-sub-header">
					
							</li>

							<li>
                                <?php echo Html::a('<span><i class="fa fa-file" aria-hidden="true">&nbsp;&nbsp;&nbsp;</i> Xuất báo cáo</span>',['/report'],['class'=>'nav-link']) ?>
							</li>
						</ul>
					</li>






					<li class="line dk hidden-folded"></li>

					<!-- <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">          
						<span>Hướng dẫn sử dụng</span>
					</li> -->  
					<!-- <li>
						<a href="page_profile.html">
							<i class="icon-user icon text-success-lter"></i>
							<b class="badge bg-success pull-right">30%</b>
							<span>Thông tin tài khoản</span>
						</a>
					</li> -->
					<!-- <li>
						<a href="">
							<i class="icon-question icon"></i>
							<span>Trợ giúp</span>
						</a>
					</li> -->
				</ul>
			</nav>
			<!-- nav -->

			<!-- aside footer -->
		<!-- 	<div class="wrapper m-t">
				<div class="text-center-folded">
					<span class="pull-right pull-none-folded">60%</span>
					<span class="hidden-folded">Milestone</span>
				</div>
				<div class="progress progress-xxs m-t-sm dk">
					<div class="progress-bar progress-bar-info" style="width: 60%;">
					</div>
				</div>
				<div class="text-center-folded">
					<span class="pull-right pull-none-folded">35%</span>
					<span class="hidden-folded">Release</span>
				</div>
				<div class="progress progress-xxs m-t-sm dk">
					<div class="progress-bar progress-bar-primary" style="width: 35%;">
					</div>
				</div>
			</div> -->
			<!-- / aside footer -->
		</div>
	</div>
</aside>