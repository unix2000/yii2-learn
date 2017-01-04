<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
	//basePath
	//baseUrl
	//css
	//cssOptions
	//depends
	//js
	//jsOptions
	//publishOptions
	//sourcePath
	public $jsOptions = [
		'position' => \yii\web\View::POS_END
	];
	public $cssOptions = [
		//'noscript' => true,
		//'condition' => 'IE 11'
	];
	public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		//'static/grid/dependents/fontAwesome/css/font-awesome.min.css',
		'http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css',
        'css/site.css',
        'static/layui/css/layui.css',
		'static/uikit/css/uikit.almost-flat.min.css',
        'static/build/css/bs3/dpl.css',
        'static/build/css/bs3/bui.css',
		'static/grid/dlshouwen.grid.min.css',
		'static/ztree/css/zTreeStyle/zTreeStyle.css',
		//'static/datatables/media/css/jquery.dataTables.min.css',
		'static/datatables/media/css/dataTables.uikit.min.css',
		'https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.dataTables.min.css',
		'https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css',
		//'css/app.less'
    ];
    public $js = [
        //'js/notification.js', //chat
		'js/Validform_v5.3.2.js',
        'static/layui/layui.js',
        'static/build/seed-min.js',
		// 'static/build/bui-min.js',
		'static/uikit/js/uikit.min.js',
		'static/uikit/js/components/accordion.min.js',
		'static/grid/dlshouwen.grid.min.js',
		'static/grid/i18n/zh-cn.js',
		'static/validform/Validform.min.js',
		'static/ztree/js/jquery.ztree.all.min.js',
		'static/datatables/media/js/jquery.dataTables.min.js',
		'static/datatables/media/js/dataTables.uikit.min.js',
		'https://cdn.datatables.net/fixedheader/3.1.2/js/dataTables.fixedHeader.min.js',
		'https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js',
		'static/repeatable/repeatable-fields.js',
		'https://unpkg.com/vue@2.1.8/dist/vue.js',
		'https://unpkg.com/vue-router/dist/vue-router.js',
		'https://unpkg.com/vue-resource@1.0.3/dist/vue-resource.min.js',
		//'js/app.ts',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		'yii\web\JqueryAsset',
        'Zelenin\yii\SemanticUI\assets\SemanticUICSSAsset',
		'yii\jui\JuiAsset',
    ];
}
