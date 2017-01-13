<h1>vue element javascript library</h1>
<div id="example" class="uk-grid">
	<div class="uk-width-2-5 uk-container-center">
		<template>
		  <el-table
		    :data="tableData3"
		    border
		    style="width: 100%"
		    @selection-change="handleSelectionChange">
		    <el-table-column
		      type="selection"
		      width="55">
		    </el-table-column>
		    <el-table-column
		      label="日期"
		      sortable
		      width="120">
		      <template scope="scope">{{ scope.row.date }}</template>
		    </el-table-column>
		    <el-table-column
		      prop="name"
		      label="姓名"
		      width="120">
		    </el-table-column>
		    <el-table-column
		      prop="address"
		      label="地址"
		      show-overflow-tooltip>
		    </el-table-column>
		  </el-table>
		</template>
	</div>
</div>
<?php
$this->beginBlock('js');

?>
new Vue({
  el: '#example',
  data: function(){
    return {
    	tableData3: [{
          date: '2016-05-03',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-02',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-04',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-01',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-08',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-06',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }, {
          date: '2016-05-07',
          name: '王小虎',
          address: '上海市普陀区金沙江路 1518 弄'
        }],
        multipleSelection: []
  	}
  },
  methods: {
	  handleSelectionChange(val) {
	    this.multipleSelection = val;
	  }
  }
})

<?php 
$this->endBlock();
$this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>
