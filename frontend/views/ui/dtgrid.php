<?php
use yii\helpers\Url;

?>

<div class="uk-grid">
	<div class="uk-width-1-4">
		<div class="uk-panel">
			<h3 class="uk-panel-title">控制菜单</h3>
			<ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
				<li class="uk-active"><a href="#">菜单1</a></li>

				<li class="uk-parent">
					<a href="#">菜单2</a>
					<ul class="uk-nav-sub">
						<li><a href="#">菜单2--01</a></li>
						<li><a href="#">菜单2--02</a>
							<ul>
								<li><a href="#">菜单2--02-01</a></li>
								<li><a href="#">菜单2--02-02</a></li>
							</ul>
						</li>
					</ul>
				</li>

				<li class="uk-parent">
					<a href="#">菜单3</a>
					<ul class="uk-nav-sub">
						<li><a href="#">菜单3-01</a></li>
						<li><a href="#">菜单3-02</a></li>
					</ul>
				</li>

				<li><a href="<?php echo Url::to(['ui/semantic']);?>">semantic</a></li>

				<li class="uk-nav-header">菜单5</li>
				<li class="uk-parent"><a href="#"><i class="uk-icon-star"></i> 菜单6</a></li>
				<li><a href="#"><i class="uk-icon-twitter"></i> 菜单7</a></li>
				<li class="uk-nav-divider"></li>
				<li><a href="#"><i class="uk-icon-rss"></i> 菜单8</a></li>
			</ul>

		</div>

	</div>
	
	<div class="uk-width-3-4">
		<div id="grid" class="dlshouwen-grid-container"></div>
		<div id="toolbar" class="dlshouwen-grid-toolbar-container"></div>
	</div>
</div>

<?php
$js = <<< JS
	//定义表格
	var gridColumns = [
		{id:'id', title:'用户编号', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'eq'},
		{id:'name', title:'用户姓名', type:'string', columnClass:'text-center', fastQuery:true, fastQueryType:'lk'},
		{id:'email', title:'Email', type:'string', columnClass:'text-center', hideType:'xs', fastQuery:true, fastQueryType:'range'},
		{id:'address', title:'地址', type:'string', columnClass:'text-center', hideType:'sm|xs', fastQuery:true, fastQueryType:'eq'},
	];
	var gridOption = {
		lang : 'zh-cn',
		ajaxLoad : true,
		// loadAll : true,
		loadURL : '/ui/datas',
		exportFileName : '数据列表',
		// datas : datas,
		check : true,
		columns : gridColumns,
		pageSize : 10,
		pageSizeLimit : [10, 20, 50],
		gridContainer : 'grid',
		toolbarContainer : 'toolbar'
	};
	var grid = $.fn.dlshouwen.grid.init(gridOption);
	$(function(){
		grid.load();
	});
JS;

$this->registerJs($js);
?>