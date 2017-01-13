<?php
use yii\helpers\Url;
use yii\captcha\Captcha;

?>

<div class="uk-gird">
    <div class="uk-width-1-4 uk-container-center">
        <form action="<?php echo Url::to(['ui/login-check'])?>" 
            method="post" 
            class="form-horizontal login-form"
            role="form">
            
          <div class="form-group">
            <label class="col-sm-3 control-label">用户名</label>
            <div class="col-sm-9">
              <input type="email" class="form-control" 
                name="username" 
                placeholder="用户名" 
                data-rule="required; username"
                data-msg-required="请填写用户名">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">密码</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" 
                name="password" 
                placeholder="密码" 
                data-msg-required="请填写密码"
                data-rule="required; password">
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-3 control-label">验证码</label>
            <div class="col-sm-4">               
                <input type="text" class="form-control" 
                    name="verify" 
                    placeholder="请填写验证码" 
                    autocomplete="off" 
                    data-msg-required="请填写验证码"
                    data-rule="required;">
            </div>
            <div class="col-sm-5">
                <img class="verifyimg reloadverify" alt="点击切换" src="<?php echo Url::to(['site/captcha'])?>">
                <a class="reloadverify" title="换一张" href="javascript:void(0)">换一张？</a>               
            </div>        
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default btn-primary login-btn">
                <span class="in"><i class="icon-loading"></i>登 录 中 ...</span>
                <span class="on">登 录</span>
              </button>
              <div class="error"></div>
            </div>
          </div>
        </form>
    </div>
</div>

<?php 
$url = Url::to(['site/captcha','refresh'=>'']);
$js = <<< JS
    $(document)
    	.ajaxStart(function(){
            //alert('ajaxStart');
    		$("button:submit").addClass("log-in").attr("disabled", true);
    	})
    	.ajaxStop(function(){
            //alert('ajaxStop');
    		$("button:submit").removeClass("log-in").attr("disabled", false);
    	});
    
    $("form").submit(function(){
		var self = $(this);
        // alert('post');
        var validator = self.validator();
        alert(validator.isValid());
        if (!validator.isValid())
            return false;
        
		$.post(self.attr("action"), self.serialize(), success, "json");
		return false;

		function success(data){
            alert('ajax success');
            console.log(data);
			if(data.status){
				//window.location.href = data.url;
			} else {
				self.find(".error").text(data.info);
				//刷新验证码
				$(".reloadverify").click();
			}
		}
	});
    
    var verifyimg = $(".verifyimg").attr("src");
    $(".reloadverify").click(function(){
        if( verifyimg.indexOf('?')>0){
            $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    });

//     $(".reloadverify").click(function(){     
//         $.get('{$url}',function(res){  
//             $(".verifyimg").attr('src',res.url);  
//         }); 
//     });

JS;

$this->registerJs($js);
?>