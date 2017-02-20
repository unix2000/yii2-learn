<?php

/* @var $this yii\web\View */
use yii\widgets\ContentDecorator;

?>

<?= $this->render('//common/alert') ?>

<h2>Guest page</h2>
<p>There's a content of guest page</p>

<h1><?= $this->context->pageTitle ?></h1>
<p>Hello call. <?php $this->context->hello() ?></p>
<?php //du($this->context) ?>

<?php 
    ContentDecorator::begin([
        'viewFile' => '@frontend/views/decorators/quote.php',
        'view' => $this,
        'params' => ['author' => 'Liner.xie']
    ]);
?> 
use yii\widgets\ContentDecorator.

<?php ContentDecorator::end();?>