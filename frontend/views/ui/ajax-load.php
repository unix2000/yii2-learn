<?php
use yii\helpers\Url;

?>

<div class="uk-grid">
	<div class="uk-width-1-5">
		<ul class="sidebar">
			<li><a href="/ui/ajax-form" class="btn btn-primary ajaxify">ajax载入表单内容</a></li>
		</ul>
	</div>
	<div class="uk-width-2-5 page-content">

	</div>
</div>

<?php
$js = <<< JS
	function loadAjaxContent(url){
		var pageContent = $('.page-content');
		//可加入载入效果
		$.ajax({
			type: "GET",
		    cache: false,
		    url: url,
		    dataType: "html",
		    success: function (res) {
		    	pageContent.html(res);
		    },
		    error: function (res, ajaxOptions, thrownError) {
		    	pageContent.html('<h4>页面载入不成功.</h4>');
		    }			
		});
	}
	
	$('.sidebar').on('click','li > a.ajaxify',function(e){
		// alert();
		e.preventDefault();
		var url = $(this).attr("href");
		loadAjaxContent(url);
	});

JS;

$this->registerJs($js);

?>