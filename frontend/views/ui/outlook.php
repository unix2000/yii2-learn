<?php
use frontend\models\Dept;

$css = <<< CS
	.ztree * {font-size: 12pt;font-family:"Microsoft Yahei",Verdana,Simsun,"Segoe UI Web Light","Segoe UI Light","Segoe UI Web Regular","Segoe UI","Segoe UI Symbol","Helvetica Neue",Arial}
	.ztree li ul{ margin:0; padding:0}
	.ztree li {line-height:30px;}
	.ztree li a {width:200px;height:30px;padding-top: 0px;}
	.ztree li a:hover {text-decoration:none; background-color: #E7E7E7;}
	.ztree li a span.button.switch {visibility:hidden}
	.ztree.showIcon li a span.button.switch {visibility:visible}
	.ztree li a.curSelectedNode {background-color:#D4D4D4;border:0;height:30px;}
	.ztree li span {line-height:30px;}
	.ztree li span.button {margin-top: -7px;}
	.ztree li span.button.switch {width: 16px;height: 16px;}

	.ztree li a.level0 span {font-size: 150%;font-weight: bold;}
	.ztree li span.button {background-image:url("/assets/images/left_menuForOutLook.png"); *background-image:url("/assets/images/left_menuForOutLook.gif")}
	.ztree li span.button.switch.level0 {width: 20px; height:20px}
	.ztree li span.button.switch.level1 {width: 20px; height:20px}
	.ztree li span.button.noline_open {background-position: 0 0;}
	.ztree li span.button.noline_close {background-position: -18px 0;}
	.ztree li span.button.noline_open.level0 {background-position: 0 -18px;}
	.ztree li span.button.noline_close.level0 {background-position: -18px -18px;}
CS;
$this->registerCss($css);
?>

<h1>ztree</h1>
<div class="row">
	<div class="col-md-4">
		<ul id="tree" class="ztree"></ul>
	</div>
</div>

<?php
$js = <<< JS
	var curMenu = null, zTree_Menu = null;
		var setting = {
			view: {
				showLine: false,
				showIcon: false,
				selectedMulti: false,
				dblClickExpand: false,
				addDiyDom: addDiyDom
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				beforeClick: beforeClick
			}
		};

		var zNodes =[
			{ id:1, pId:0, name:"文件夹", open:true},
			{ id:11, pId:1, name:"收件箱"},
			{ id:111, pId:11, name:"收件箱1"},
			{ id:112, pId:111, name:"收件箱2"},
			{ id:113, pId:112, name:"收件箱3"},
			{ id:114, pId:113, name:"收件箱4"},
			{ id:12, pId:1, name:"垃圾邮件"},
			{ id:13, pId:1, name:"草稿"},
			{ id:14, pId:1, name:"已发送邮件"},
			{ id:15, pId:1, name:"已删除邮件"},
			{ id:3, pId:0, name:"快速视图"},
			{ id:31, pId:3, name:"文档"},
			{ id:32, pId:3, name:"照片"}
		];

		function addDiyDom(treeId, treeNode) {
			var spaceWidth = 5;
			var switchObj = $("#" + treeNode.tId + "_switch"),
			icoObj = $("#" + treeNode.tId + "_ico");
			switchObj.remove();
			icoObj.before(switchObj);

			if (treeNode.level > 1) {
				var spaceStr = "<span style='display: inline-block;width:" + (spaceWidth * treeNode.level)+ "px'></span>";
				switchObj.before(spaceStr);
			}
		}

		function beforeClick(treeId, treeNode) {
			if (treeNode.level == 0 ) {
				var zTree = $.fn.zTree.getZTreeObj("tree");
				zTree.expandNode(treeNode);
				return false;
			}
			return true;
		}

		$(document).ready(function(){
			var treeObj = $("#tree");
			$.fn.zTree.init(treeObj, setting, zNodes);
			zTree_Menu = $.fn.zTree.getZTreeObj("tree");
			curMenu = zTree_Menu.getNodes()[0].children[0].children[0];
			zTree_Menu.selectNode(curMenu);

			treeObj.hover(function () {
				if (!treeObj.hasClass("showIcon")) {
					treeObj.addClass("showIcon");
				}
			}, function() {
				treeObj.removeClass("showIcon");
			});
		});
JS;

$this->registerJs($js);