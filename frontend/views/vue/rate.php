<h1>vue element javascript library</h1>
<div id="example" class="uk-grid">
	<div class="uk-width-2-5 uk-container-center">
		<div class="block">
		  <span class="demonstration">默认不区分颜色</span>
		  <el-rate v-model="value1"></el-rate>
		</div>
		<div class="block">
		  <span class="demonstration">区分颜色</span>
		  <el-rate
		    v-model="value2"
		    :colors="['#99A9BF', '#F7BA2A', '#FF9900']">
		  </el-rate>
		</div>
	</div>
</div>
<?php
$this->beginBlock('js');

?>
new Vue({
  el: '#example',
  data: function(){
    return {
    	value1: null,
        value2: null
  	}
  }
})

<?php 
$this->endBlock();
$this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>
