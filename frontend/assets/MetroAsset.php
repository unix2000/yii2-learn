<?php
namespace frontend\assets;
use yii\web\AssetBundle;

class MetroAsset extends AssetBundle
{
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css',
        'static/metro/global/plugins/simple-line-icons/simple-line-icons.min.css',
        'static/metro/global/css/components.min.css',
        'static/metro/global/css/plugins.min.css',
        // 'static/uikit/css/uikit.almost-flat.min.css',
        'static/metro/layouts/layout/css/layout.min.css',
        'static/metro/layouts/layout/css/themes/darkblue.min.css',
    ];
    public $js = [
        'static/metro/global/plugins/bootstrap/js/bootstrap.min.js',
        'static/metro/global/plugins/js.cookie.min.js',
        'static/metro/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'static/metro/global/plugins/jquery.blockui.min.js',
        'static/metro/global/scripts/app.js',
        'static/metro/layouts/layout/scripts/layout.js',
        'static/metro/layouts/layout/scripts/demo.js',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_END
    ];
	public $depends = [
        //'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		'yii\web\JqueryAsset',
    ];
}