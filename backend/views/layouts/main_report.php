<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

use backend\widgets\AsideLeft;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
    <?php
        $host = 'http://'.$_SERVER['HTTP_HOST'];
        $homeUrl = Yii::$app->urlManager->baseUrl;
        $homeUrl =  str_replace('backend/web', '', $homeUrl);
    ?>
    <script type="text/javascript">
        function homeUrl(){
            return '<?php echo $host.$homeUrl; ?>';
        }
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<div class="">
  

    <!-- header -->

  <!-- / header -->


  <!-- aside -->

  <!-- / aside -->


  <!-- content -->
  <div id="content" class="container" role="main">
    <div class="app-content-body ">
		<?= $content ?>
    </div>
  </div>
  <!-- /content -->
  




</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


