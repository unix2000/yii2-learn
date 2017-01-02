<?php
use yii\widgets\Pjax;  
use yii\helpers\Html;

?>
<h1>Yii2 pjax examples vote</h1>
<?php Pjax::begin(['enablePushState' => false]); ?>
<?= Html::a('', ['pjax/upvote'], ['class' => 'btn btn-lg btn-warning glyphicon glyphicon-arrow-up']) ?>
<?= Html::a('', ['pjax/downvote'], ['class' => 'btn btn-lg btn-primary glyphicon glyphicon-arrow-down']) ?>
<h1><?= Yii::$app->session->get('votes', 0) ?></h1>
<?php Pjax::end(); ?>