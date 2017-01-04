<?php
//metronic4.7
use yii\helpers\Html;
use frontend\assets\MetroAsset;

MetroAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    
</div>
<!-- END HEADER -->

<div class="clearfix"></div>

<!-- container -->
<div class="page-container">
	<?= $content ?>
</div>
<!-- end container -->

<!-- BEGIN FOOTER -->
<div class="page-footer page-footer-fixed">
    <div class="page-footer-inner">
         2016 &copy; Metronic v4.7 <?= Yii::powered() ?>
    </div>
    <div class="page-footer-tools">
        <span class="go-top">
        <i class="fa fa-angle-up"></i>
        </span>
    </div>
</div>
<!-- END FOOTER -->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
