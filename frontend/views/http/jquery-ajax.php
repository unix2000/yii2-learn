<h1>Jquery jsonp</h1>

<button class="btn btn-primary" onclick="getdata();">Jquery jsonp</button>
<div class="uk-grid">
	<div class="uk-width-2-5">
		<div id="data"></div>
	</div>
</div>

<script type="text/javascript">
<?php
	//如果定义js函数,加载js必须这样写
	$this->beginBlock('js');
?>

function getdata(){
	var lists = "";
	$.ajax({
		url: 'https://api.douban.com/v2/movie/top250?count=10',
		type: 'get',
		dataType: 'jsonp',
		//传递给请求处理程序，用以获得jsonp回调函数名的参数名(默认为:callback)
        // jsonp: "jsoncallback",
        //自定义的jsonp回调函数名称，默认为jQuery自动生成的随机函数名
        // jsonpCallback:"success_jsonpCallback",
		// timeout:10,
		// data: {},
		success: function(data){
			// console.log(data);
			// console.log(data.subjects);
			// var lists = "";
			$.each( data.subjects, function( k, v ) {
				// console.log(v);
				lists += '<li>' + v.title + '</li>' + 
					'<img src=' + v.images.small + '>';
			});
			$('#data').html(lists);
		},
		complete: function(res) {
			console.log(res);
		},
		error: function(res) {
			console.log(res);
		}
	});
}

<?php
	$this->endBlock();
	$this->registerJs($this->blocks['js'], \yii\web\View::POS_END);
?>
</script>

<?php $this->beginBlock('footer'); ?>
	<h1>footer blocks</h1>
	<h1>如果用block这种方式加载js，必须实现布局文件main.php中定义的block footer</h1>
<?php $this->endBlock(); ?>
