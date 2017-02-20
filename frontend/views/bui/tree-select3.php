<?php
use yii\helpers\Url;

?>

<h1>Tree Select上报--</h1>
<div class="uk-grid" data-uk-grid-margin>
    <div class="uk-width-4-5 uk-container-center">
        <div id="grid"></div>
    </div>
    <div class="uk-width-4-5 uk-container-center">
        <button type="sumbmit" class="button button-primary" id="bSubmit">提交</button>
    </div>
</div>

<?php 
$js = <<< JS
     BUI.use(['bui/grid','bui/data'],function(Grid,Data){
            var Grid = Grid,
          Store = Data.Store,
          enumObj = {"1" : "选项一","2" : "选项二","3" : "选项三"},
          columns = [
            {title : '文本',dataIndex :'a',editor : {xtype : 'text'}}, //editor中的定义等用于 BUI.Form.Field.Text的定义
            {title : '数字', dataIndex :'b',editor : {xtype : 'number',rules : {required : true}},summary : true},
            {title : '日期',dataIndex :'c', editor : {xtype : 'date'},renderer : Grid.Format.dateRenderer},
            {title : '单选',dataIndex : 'd', editor : {xtype :'select',items : enumObj},renderer : Grid.Format.enumRenderer(enumObj)}
          ],
          data = [{a:'123'},{a:'cdd',c:1363924044176},{a:'1333',b:2222,d:2}];
 
        var editing = new Grid.Plugins.CellEditing(),
          store = new Store({
            data : data,
            autoLoad:true
          }),
          grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            width : 700,
            forceFit : true,
            tbar:{ //添加、删除
                items : [{
                  btnCls : 'button button-small',
                  text : '<i class="icon-plus"></i>添加',
                  listeners : {
                    'click' : addFunction
                  }
                },
                {
                  btnCls : 'button button-small',
                  text : '<i class="icon-remove"></i>删除',
                  listeners : {
                    'click' : delFunction
                  }
                },
				{
                  btnCls : 'button button-small',
                  text : '<i class="icon-plus"></i>获取数据',
                  listeners : {
                    'click' : getDatas
                  }
                }]
            },
            plugins : [editing,Grid.Plugins.CheckSelection,Grid.Plugins.Summary],
            store : store
          });
 
        grid.render();
 
        //添加记录
        function addFunction(){
          var newData = {b : 0};
          store.addAt(newData,0);
          editing.edit(newData,'a'); //添加记录后，直接编辑
        }
        //删除选中的记录
        function delFunction(){
          var selections = grid.getSelection();
          store.remove(selections);
        }  
		//获取表格数据
		function getDatas(){
			console.log(store.getResult());
		}
      });
JS;
$this->registerJs($js);
?>