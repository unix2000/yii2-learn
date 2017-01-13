<?php
use yii\helpers\Url;


?>
<h1>企业在线上报表格自动生成器--</h1>
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
        var enumObj = {"1" : "选项一","2" : "选项二","3" : "选项三"};
        var columns = {$json};
//         var columns = [
//             {title:'报销内容',dataIndex:'bxc',editor:{}},
//             {title:'报销日期',dataIndex:'bxdate',editor:{}},
//             {title:'报销金额',dataIndex:'bxnum',editor:{}},
//             {title:'报销备注',dataIndex:'bxdes',editor:{}}
//         ];
        var data = [];
        
        var editing = new Grid.Plugins.CellEditing({
            triggerSelected : false //触发编辑的时候不选中行
        });
        var store = new Data.Store({
            data : data,
            autoLoad:true
        });
        var grid = new Grid.Grid({
            render: '#grid',           
            columns : columns,
            forceFit : true,
            tbar:{
                items : [{
                  btnCls : 'btn btn-primary',
                  text : '<i class="icon-plus"></i>添加',
                  listeners : {
                    'click' : addColumn
                  }
                },
                {
                  btnCls : 'btn btn-primary',
                  text : '<i class="icon-remove"></i>删除',
                  listeners : {
                    'click' : delColumn
                  }
                }]
            },
            plugins : [editing,Grid.Plugins.CheckSelection,Grid.Plugins.ColumnChecked],
            store: store
        });
        grid.render();
        
        $('#bSubmit').on('click',function(e){
            console.log(grid.getItems());
        });
        function addColumn() {
            var newData = { bxnum: 0 };
            store.addAt(newData,0);
            editing.edit(newData,'bxc');
        }
        function delColumn() {
            var selections = grid.getSelection();
            store.remove(selections);
        }       
    });
JS;
$this->registerJs($js);
?>