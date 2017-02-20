<?php

use yii\helpers\Html;
use yii\helpers\Url;

/*
 * @var yii\web\View $this
 * @var app\models\Post $model
 */

?>
<p><?= Html::a('< 回退', Url::toRoute('items/index')); ?></p>

<h2><?= Html::encode($model->name);?></h2>
<p><?= Html::encode($model->email);?></p>