<?php 
namespace backend\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class AsideLeft extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('AsideLeft');
    }
}

 ?>