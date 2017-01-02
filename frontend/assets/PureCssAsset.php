<?php
namespace frontend\assets;

use yii\web\AssetBundle;
class PureCssAsset extends AssetBundle
{
	public $sourcePath = '@bower/purecss';
	public $css = [
		'build/base-min.css',
	];
	public $publishOptions = [
		'only' => [
			'build/'
		]
	];
}