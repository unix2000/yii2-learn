<h1>vue element javascript library</h1>
<div id="example" class="uk-grid">
	<div class="uk-width-2-5 uk-container-center">
		<el-tree
		  :data="regions"
		  :props="props"
		  :load="loadNode"
		  lazy
		  show-checkbox
		  @check-change="handleCheckChange">
		</el-tree>
	</div>
</div>
<?php
$this->beginBlock('js');

?>
new Vue({
  el: '#example',
  data: function(){
    return {
    	regions: [{
          'name': 'region1'
        }, {
          'name': 'region2'
        }],
        props: {
          label: 'name',
          children: 'zones'
        },
        count: 1
  	}
  },
  methods: {
      handleCheckChange(data, checked, indeterminate) {
        console.log(data, checked, indeterminate);
      },
      handleNodeClick(data) {
        console.log(data);
      },
      loadNode(node, resolve) {
        if (node.level === 0) {
          return resolve([{ name: 'region1' }, { name: 'region2' }]);
        }
        if (node.level > 3) return resolve([]);

        var hasChild;
        if (node.data.name === 'region1') {
          hasChild = true;
        } else if (node.data.name === 'region2') {
          hasChild = false;
        } else {
          hasChild = Math.random() > 0.5;
        }

        setTimeout(() => {
          var data;
          if (hasChild) {
            data = [{
              name: 'zone' + this.count++
            }, {
              name: 'zone' + this.count++
            }];
          } else {
            data = [];
          }

          resolve(data);
        }, 500);
      }
    }
})

<?php 
$this->endBlock();
$this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>
