<h1>vue element javascript library</h1>
<div id="example" class="uk-grid">
	<div class="uk-width-2-5 uk-container-center">
		<el-upload
		  action="//jsonplaceholder.typicode.com/posts/"
		  type="drag"
		  :thumbnail-mode="true"
		  :on-preview="handlePreview"
		  :on-remove="handleRemove"
		  :default-file-list="fileList"
		>
		  <i class="el-icon-upload"></i>
		  <div class="el-dragger__text">将文件拖到此处，或<em>点击上传</em></div>
		  <div class="el-upload__tip" slot="tip">只能上传jpg/png文件，且不超过500kb</div>
		</el-upload>
	</div>
</div>
<?php
$this->beginBlock('js');

?>
new Vue({
  el: '#example',
  data: function(){
    return {
    	fileList: [{name: '001.jpg', url: 'http://frontend.dev/001.jpg'}]
      }
  },
  methods: {
      handleRemove(file, fileList) {
        console.log(file, fileList);
      },
      handlePreview(file) {
        console.log(file);
      }
  }
})

<?php 
$this->endBlock();
$this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>
