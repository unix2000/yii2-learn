<?php
use yii\widgets\Pjax;  
use yii\helpers\Html;

?>
<h1>Yii2 pjax auto refresh</h1>
<?php Pjax::begin(); ?>
<?= Html::a("Refresh", ['pjax/auto-refresh'], ['class' => 'btn btn-lg btn-primary', 'id' => 'refreshButton']) ?>
<h1>Current time: <?= $time ?></h1>
<?php Pjax::end(); ?>

<?php
$script = <<< JS
	setInterval(function(){ $("#refreshButton").click(); }, 6000);
JS;
$this->registerJs($script);
?>