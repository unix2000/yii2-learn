<h1>vue element javascript library</h1>
<div id="example">
	<el-button type="text" @click="dialogVisible = true">点击打开 Dialog</el-button>

	<el-dialog title="提示" v-model="dialogVisible" size="tiny">
	  <span>这是一段信息</span>
	  <span slot="footer" class="dialog-footer">
	    <el-button @click="dialogVisible = false">取 消</el-button>
	    <el-button type="primary" @click="dialogVisible = false">确 定</el-button>
	  </span>
	</el-dialog>
</div>
<?php
$this->beginBlock('js');

?>
new Vue({
  el: '#example',
  data: function(){
    return { dialogVisible: false }
  }
})

<?php 
$this->endBlock();
$this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>
