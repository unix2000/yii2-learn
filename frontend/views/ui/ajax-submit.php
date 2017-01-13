<?php
use yii\helpers\Url;
?>
<div class="uk-grid">
    <div class="uk-width-2-5 uk-container-center">
        <div class="ui form">
    		<form action="<?php echo Url::to(['ui/ajax-store'])?>" method="post">
    
    			<div class="field">
    				<label>用户名</label>
    				<input type="text" name="fullname" placeholder="Amon Bower">
    			</div>
    
    			<div class="field">
    				<label>手机号码</label>
    				<input type="text" name="phone" placeholder="+7 (999) 123-456-789">
    			</div>
    
    			<div class="field">
    				<label>文本内容</label>
    				<textarea name="text" placeholder="Enter your comments"></textarea>
    			</div>
    
    			<div class="field">
    			    <label for="attach" style="color: #fff" class="ui green button">附件</label>
    			    <input type="file" name="attach" id="attach" style="display:block">
    			</div>
    
    			<div class="inline fields">
    				<label>请选择性别</label>
    				<div class="field">
    				  <div class="ui radio checkbox">
    				    <input type="radio" value="male" name="gender" checked="checked">
    				    <label for="gender">男</label>
    				  </div>
    				</div>
    				<div class="field">
    				  <div class="ui radio checkbox">
    				    <input type="radio" value="female" name="gender">
    				    <label>女</label>
    				  </div>
    				</div>
    			</div>
    
    			<div class="ui segment">
    				<div class="field">
    				  <div class="ui toggle checkbox">
    				    <input type="checkbox" name="checkbox" tabindex="0" class="hidden">
    				    <label>check点击?</label>
    				  </div>
    				</div>
    			</div>
    
    			<div class="field">
    				<button type="submit" class="ui fluid big submit button">提交表单</button>
    			</div>
    		</form>
    		<div class="ui hidden message">
    			<div class="header">Form Completed!</div>
    			<p>你的表单已成功发送!</p>
    		</div>
    	</div>
    </div>
</div>

<?php 
$js = <<< JS
   $('form').fajax({
		beforeSend: function(){
			$('.form').addClass('loading');
			$('.message,.form').removeClass('error success');
			$('.message').removeClass('hidden');
		},
	    complete: function(data){
	    	console.log(data);
	        $('.form').removeClass('loading');
	    },
	    success: function(){
	    	$('.message,.form').addClass('success');
	    	$('.message .header').text('Form Completed!');
	    	$('.message p').text('Your form successfully sent!');
	    },
	    error: function(){
	    	$('.message,.form').addClass('error');
	    	$('.message .header').text('Action Forbidden!');
	    	$('.message p').text('服务器发生错误 :(');
	    }
	});

	$('.ui.checkbox').checkbox(); 

JS;
$this->registerJs($js);
?>