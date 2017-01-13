<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
      'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css',

      // 'libs/assets/animate.css/animate.css',
      // 'libs/assets/font-awesome/css/font-awesome.min.css',
      // 'libs/assets/simple-line-icons/css/simple-line-icons.css',
      // 'libs/jquery/bootstrap/dist/css/bootstrap.css',

      'css/app.min.css',
      'css/jquery-ui.css',
      'css/site.css',
      'css/site2.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        // 'js/app.min.js',
        // 'js/app1.js',
        // 'js/app2.js',
        // 'js/app3.js',
        'js/jquery-ui.js',
        'js/main.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset'
    ];
}
