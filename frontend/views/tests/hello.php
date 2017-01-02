<?php
use frontend\components\GreetingWidget;
use frontend\components\EchoWidget;
?>

<?php EchoWidget::begin(); ?>
<?php echo "<h1>Echo EchoWidget使用!</h1>"; ?>
<?php EchoWidget::end(); ?>

<?php
    echo GreetingWidget::widget(['name' => ' Charles']);
?>