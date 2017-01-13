<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid" style="height:100%">
    <div class="row" style="height:100%">
        <div class="col-md-8 col-xs-8" id="full1">
            <section style="clear:both">
                <div style="clear:both">
                    <img class="title-img" src="<?php echo Yii::$app->getUrlManager()->getBaseUrl() ?>/img/logo1.png" alt="logo">
                    <h1 class="title-login">Phần mềm quản lí học sinh tiểu học</h1>
                </div>
            </section>
            <section>
                <h4 class="title-login2">Đơn vị sử dụng: Trường tiểu học Trâu Quỳ - Gia Lâm - Hà Nội</h4>
                <h5 class="title-login3"><span style="font-weight:bold">Địa chỉ:</span> Cửu Việt, thị trấn Trâu Quỳ, Gia Lâm, Hà Nội </h5>
            </section>
            <section class="section3" style="padding-top: 75px">
            
                <h4 class="htkh-title"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp;Trung Tâm Hỗ Trợ Khách Hàng: </h4>
                <p class="htkh"><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp; Số điện thoại : (043) 636823193 - (043) 67539888</p>
                <p class="htkh"><i class="fa fa-envelope-open" aria-hidden="true"></i>&nbsp;&nbsp; Email: nnthucthb@gmail.com</p>
                <p class="htkh"><i class="fa fa-address-card" aria-hidden="true"></i>&nbsp; Địa chỉ: Văn phòng bộ môn Công Nghệ Phần Mềm - Học Viện Nông Nghiệp Việt Nam</p>
             
            </section>
        </div>
        <div class="col-md-4 col-xs-4" id="full">
            <div class="app app-header-fixed">
                 <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
                    <a href class="navbar-brand block m-t" style="font-size: 22px;">Trường tiểu học Trâu Quỳ</a>
                    <div class="m-b-lg">
                        <div class="wrapper text-center">
                            <strong>Đăng nhập để tiếp tục sử dụng phần mềm</strong>
                        </div>

                        <!-- <form name="form" class="form-validation"> -->
                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'class'=>'form-validation'
                            ]); ?>
                            <div class="text-danger wrapper text-center" ng-show="authError">

                            </div>
                            <div class="list-group list-group-sm">
                                <div class="list-group-item2">
                                    <!-- <input type="email" placeholder="Tên đăng nhập ..." class="form-control no-border" ng-model="user.email" required> -->
                                    <?= $form->field($model, 'username')->textInput(
                                        ['autofocus' => false,'class'=>'form-control no-border','placeholder' => 'Tên đăng nhập ...']
                                    )->label(false) ?>
                                </div>
                                <div class="list-group-item2">
                                    <!-- <input type="password" placeholder="Mật khẩu ..." class="form-control no-border" ng-model="user.password" required> -->
                                    <?= $form->field($model, 'password')->passwordInput(
                                        ['autofocus' => false,'class'=>'form-control no-border','placeholder' => 'Mật khẩu...']
                                    )->label(false) ?>
                                </div>
                                <div>
                                     <?= $form->field($model, 'rememberMe')->checkbox(['value' => '0'])->label('Ghi nhớ tôi') ?>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-lg btn-primary btn-block" ng-click="login()" ng-disabled='form.$invalid'>Đăng nhập</button> -->
                            <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-lg btn-primary btn-block', 'name' => 'login-button']) ?>
                            <?php ActiveForm::end(); ?>
                            <div class="text-center m-t m-b">
                                <a ui-sref="access.forgotpwd">Bạn quên mật khẩu ?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
