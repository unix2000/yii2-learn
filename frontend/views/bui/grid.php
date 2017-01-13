<div class="row">
    <div class="col-md-10">
		<div id="grid"></div>
		<div id="bar"></div>
    </div>
</div>

<?php
$js = <<< JS
    BUI.use(['bui/grid','bui/data','bui/toolbar'],function(Grid,Data,Toolbar){
            var Grid = Grid,
          Store = Data.Store,
          columns = [
			{title : 'ID',dataIndex :'id', width:80},
            {title : '用户姓名',dataIndex :'name', width:160},
            {id: '123',title : '电子邮件',dataIndex :'email', width:180},
            {title : '地址',dataIndex : 'address',width:200}
          ];
 
        /**
         * 自动发送的数据格式：
         *  1. start: 开始记录的起始数，如第 20 条,从0开始
         *  2. limit : 单页多少条记录
         *  3. pageIndex : 第几页，同start参数重复，可以选择其中一个使用
         *
         * 返回的数据格式：
         *  {
         *     "rows" : [{},{}], //数据集合
         *     "results" : 100, //记录总数
         *     "hasError" : false, //是否存在错误
         *     "error" : "" // 仅在 hasError : true 时使用
         *   }
         * 
         */
        var store = new Store({
            url : '/bui/datas',
            autoLoad:true, //自动加载数据
			
		    //params : { //配置初始请求的参数
              //a : 'a1',
              //b : 'b1'
            //},
            pageSize:12	// 配置分页数目
          }),
        //simpleGrid
//         grid = new Grid.SimpleGrid({
//             render: '#grid',
//             columns: columns,
//             store: store,
//             loadMask: true,
//             innerBorder : false,
//             tableCls:'uk-table uk-table-bordered uk-table-striped'
//         });
          grid = new Grid.Grid({
            render:'#grid',
            columns : columns,
            loadMask: true, //加载数据时显示屏蔽层
            store: store,
			plugins : [Grid.Plugins.RadioSelection]
			//plugins : [Grid.Plugins.CheckSelection]
            // 底部工具栏
            //bbar:{
                // pagingBar:表明包含分页栏
                //pagingBar:true
           // }
          });
		var bar = new Toolbar.NumberPagingBar({
          render : '#bar',
          elCls : 'pagination pull-right',
          store : store
        });
        bar.render();
        grid.render();
	});
JS;
$this->registerJs($js);
?>