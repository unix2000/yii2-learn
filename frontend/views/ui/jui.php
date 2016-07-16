<?php 
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'action' => ['ui/valid'],
    'method'=>'post',
    'id' => 'reg-form',        
]); 
?>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <?= $form->field($model, 'username')->textInput(['maxlength' => 12]) ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => 12]) ?>
        <?= $form->field($model, 'sex')->radioList(['1'=>'男','0'=>'女']) ?>
        <?= $form->field($model, 'edu')->dropDownList(['1'=>'大学','2'=>'高中','3'=>'初中'],['prompt'=>'请选择','style'=>'width:120px']) ?>
        <?= $form->field($model, 'images')->fileInput() ?>
        <?= $form->field($model, 'hobby')->checkboxList(['0'=>'篮球','1'=>'足球','2'=>'羽毛球','3'=>'乒乓球']) ?>
        <?= $form->field($model, 'info')->textarea(['rows'=>6]) ?>
        <?= $form->field($model, 'verifyCode')->widget(
            Captcha::className(), [
                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',              
            ]
        )->label('验证码',['class' => 'key']) ?>
        <?= Html::submitButton('提交', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>   
        <?= Html::resetButton('重置', ['class'=>'btn btn-primary','name' =>'submit-button']) ?>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>