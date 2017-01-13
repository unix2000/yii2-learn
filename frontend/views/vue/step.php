<h1>vue element javascript library</h1>
<div id="example" class="uk-grid">
	<div class="uk-width-2-5 uk-container-center">
		<el-steps :space="100" :active="active" finish-status="success">
		  <el-step title="步骤 1"></el-step>
		  <el-step title="步骤 2"></el-step>
		  <el-step title="步骤 3"></el-step>
		</el-steps>
		<el-button style="margin-top: 12px;" @click="next">下一步</el-button>
	</div>
</div>
<?php
$this->beginBlock('js');

?>
new Vue({
  el: '#example',
  data: function(){
    return {
    	active: 0
  	}
  },
  methods: {
      next() {
        if (this.active++ > 2) this.active = 0;
      }
  }
})

<?php 
$this->endBlock();
$this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>
