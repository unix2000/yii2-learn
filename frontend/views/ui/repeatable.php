<?php
use yii\helpers\Url;

//报销表单测试
//.row样式未调整
?>
<h1>报销表简单实现</h1>
<form action="<?php echo Url::to(['ui/store']);?>" method="post">
<input type="hidden" value="<?php echo \Yii::$app->request->csrfToken; ?>" name="_csrf">
<div class="repeat">
	<table class="wrapper uk-table uk-table-hover uk-table-striped uk-table-condensed" width="100%">
		<thead>
			<tr>
				<td width="10%"><span class="add btn btn-primary">添加</span></td>
				<td width="10%">单据号</td>
				<td width="10%">报销摘要</td>
				<td width="10%">报销时间</td>
				<td width="10%">表头4</td>
				<td width="10%">表头5</td>
				<td width="10%">表头6</td>
				<td width="10%">操作</td>
			</tr>
		</thead>
		<tbody class="container">
		<tr class="template row">
			<td width="10%"><span class="move btn btn-info">移动</span></td>
			<td width="10%"><input type="text" name="zhaiyao[{{row-count-placeholder}}]" /></td>
			<td width="10%"><input class="layui-input" placeholder="自定义日期格式" onclick="layui.laydate({elem: this, istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"></td>
			<td width="10%"><input class="layui-input" placeholder="开启节日" onclick="layui.laydate({elem: this, festival: true})"></td>
			<td width="10%"><input class="layui-input" placeholder="只能选昨天到明天" onclick="layui.laydate({elem: this, min: laydate.now(-1), max: laydate.now(+1)})"></td>
			<td width="10%">An Input Field</td>
			<td width="10%">
				<input type="text" name="an-input-field[{{row-count-placeholder}}]" />
			</td>
			<td width="10%"><span class="remove btn btn-danger">删除</span></td>
		</tr>
		</tbody>
	</table>
</div>
<button name="submit" type="submit" class="btn btn-primary">提交</button>
</form>


<?php
$js = <<< JS
	//.move需jquery-ui支持
	$('.repeat').each(function() {
		jQuery(this).repeatable_fields({
			wrapper: 'table',
			container: 'tbody'
		});
	});
	
	layui.js使用cmd方式
	layui.use('laydate', function(){
		var laydate = layui.laydate;
	});
JS;
$this->registerJs($js);