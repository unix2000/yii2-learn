<?php
use yii\helpers\Url;

?>
<h1>block js加载方式</h1>
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

<script type="text/javascript">
<?php 
//另一种加载js方式
$this->beginBlock('js');

?>
	$('.repeat').each(function() {
		jQuery(this).repeatable_fields({
			wrapper: 'table',
			container: 'tbody',
		});
	});
	
	//layui.js使用cmd方式
	layui.use('laydate', function(){
		var laydate = layui.laydate;
	});
<?php 
	$this->endBlock();
	$this->registerJs($this->blocks['js'], \yii\web\View::POS_END);
?>
</script>

<?php $this->beginBlock('footer'); ?>
	<h1>footer blocks</h1>
	<h1>如果用block这种方式加载js，必须实现布局文件main.php中定义的block footer</h1>
<?php $this->endBlock(); ?>
