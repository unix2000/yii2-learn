<?php
use frontend\models\Dept;
//简单实现,引用实现代码更短
/**
function simple_tree( $id = 0 ){
	$data = Dept::find()
		//->select(['id as key','dept_name as title'])
		->select([ 'id' , 'dept_name' , 'dept_parent' ])
		->where([ 'dept_parent' => $id ])->asArray()->all();
	$arr = array();
	foreach ( $data as $k => $v ) {
		$arr[$k]['id'] = $v['id'];
		$arr[$k]['name'] = $v['dept_name'];
		$count = Dept::find()->where([ 'dept_parent' => $v['id'] ])->count();
		if( $count > 0 ) {
			$arr[$k]['open'] = true;
			$arr[$k]['children'] = simple_tree($v['id']);
		}
	}
	return $arr;
	//return $data;
}
$arr = simple_tree();
$data = json_encode($arr);
**/
?>

<h1>ztree</h1>
<div class="row">
	<div class="col-md-3">
		<div id="ztree" class="ztree"></div>
	</div>
</div>

<?php
$js = <<< JS
	var setting = {
            view: {
                //addHoverDom: addHoverDom,
                //removeHoverDom: removeHoverDom,
                //selectedMulti: false
				showLine: false
            },
            check: {
                enable: true,
				chkStyle: "radio"
            },
            data: {
                simpleData: {
                    enable: true
                }
            },
			callback: {
				onClick: zTreeOnClick
			}
        };

        var zNodes = {$data};

        $(document).ready(function(){
            $.fn.zTree.init($("#ztree"), setting, zNodes);
        });

        var newCount = 1;
        function addHoverDom(treeId, treeNode) {
            var sObj = $("#" + treeNode.tId + "_span");
            if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
            var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
                + "' title='add node' onfocus='this.blur();'></span>";
            sObj.after(addStr);
            var btn = $("#addBtn_"+treeNode.tId);
            if (btn) btn.bind("click", function(){
                var zTree = $.fn.zTree.getZTreeObj("ztree");
                zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
                return false;
            });
        };
        function removeHoverDom(treeId, treeNode) {
            $("#addBtn_"+treeNode.tId).unbind().remove();
        };
		function zTreeOnClick(event, treeId, treeNode) {
			//alert(treeNode.tId + ", " + treeNode.name);
			alert(treeNode.id + ", " + treeNode.name);
		};
JS;

$this->registerJs($js);