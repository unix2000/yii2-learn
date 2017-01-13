<?php
use yii\helpers\Url;

?>

<h1>==自定义生成表格==</h1>
<div class="uk-grid">
    <div class="uk-width-4-5 uk-container-center">
        <div id="grid"></div>
        <div id="bar"></div>
    </div>
</div>


<?php 
$js = <<< JS
    BUI.use(['bui/grid','bui/data','bui/toolbar'],function(Grid,Data,Toolbar){
        var columns = {$json};
        var store = new Data.Store({
            url: '/bui/datas',
            autoLoad: true,
            pageSize: 6
        });
        
        var grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            store: store,
            loadMask: true,
            plugins : [Grid.Plugins.RadioSelection]
        });
        var bar = new Toolbar.NumberPagingBar({
          render : '#bar',
          elCls : 'pagination pull-right',
          store : store
        });
        grid.render();
        bar.render();
    });
JS;
$this->registerJs($js);
?>