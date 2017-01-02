<?php
use yii\widgets\Pjax;  
use yii\helpers\Html;

?>  

<h1>Yii2 pjax examples</h1>
<?php Pjax::begin(); ?>
<?= Html::a("Refresh", ['pjax/index'], ['class' => 'btn btn-lg btn-primary']);?>
<h1>Current time: <?= $response ?></h1>
<?php Pjax::end(); ?>

<?php Pjax::begin(); ?>
<?= Html::a("Show Time", ['pjax/time'], ['class' => 'btn btn-lg btn-primary']) ?>
<?= Html::a("Show Date", ['pjax/date'], ['class' => 'btn btn-lg btn-success']) ?>
<h1>It's: <?= $response ?></h1>
<?php Pjax::end(); ?>