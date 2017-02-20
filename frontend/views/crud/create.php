<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/*
 * @var yii\web\View $this
 */

?>
<h1><?= Yii::t('app', '新增'); ?></h1>
<?php $form = ActiveForm::begin();?>
<?php $form->errorSummary($model); ?>

<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'email')->textarea() ?>

<?= Html::submitButton(Yii::t('app', '新增'), ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end(); ?>