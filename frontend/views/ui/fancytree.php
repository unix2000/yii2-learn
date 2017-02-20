<?php
use yii\web\JsExpression;
use yii\helpers\Url;
use frontend\models\Dept;
// Example of data.
$data = [
	['title' => 'Node 1', 'key' => 1],
	['title' => 'Folder 2', 'key' => '2', 'folder' => true, 'children' => [
		['title' => 'Node 2.1', 'key' => '3'],
		['title' => 'Node 2.2', 'key' => '4']
	]]
];

//http://wwwendt.de/tech/fancytree/demo/
function child( $id = 0 ){
	$data = Dept::find()
		//->select(['id as key','dept_name as title'])
		->select([ 'id' , 'dept_name' ])
		->where([ 'dept_parent' => $id ])->asArray()->all();
	$arr = array();
	foreach ( $data as $k => $v ) {
		$arr[$k]['key'] = $v['id'];
		$arr[$k]['title'] = $v['dept_name'];
		$count = Dept::find()->where([ 'dept_parent' => $v['id'] ])->count();
		if( $count > 0 ) {
			$arr[$k]['folder'] = true;
			$arr[$k]['children'] = child($v['id']);
		}
	}
	return $arr;
	//return $data;
}
$tree = child();
?>
<br />
<div class="row">
	<div class="col-md-4">
		<?php
		echo \wbraganca\fancytree\FancytreeWidget::widget([
			'options' =>[
				'source' => $tree,
				'checkbox' => true,
				'selectMode' => 1, //1Ϊ��ѡradiobox 2 3
				//'titlesTabbable' => true, // Add all node titles to TAB chain
				//'quicksearch' => true,
				'select' => new JsExpression('
					function(event, data) {
						var selKeys = $.map(data.tree.getSelectedNodes(), function(node){
						  return node.key;
						});
						$("#echoSelection3").text(selKeys.join(", "));

						// Get a list of all selected TOP nodes
						var selRootNodes = data.tree.getSelectedNodes(true);
						// ... and convert to a key array:
						var selRootKeys = $.map(selRootNodes, function(node){
						  return node.key;
						});
						$("#echoSelectionRootKeys3").text(selRootKeys.join(", "));
						$("#echoSelectionRoots3").text(selRootNodes.join(", "));
					  }
				'),
				'extensions' => ['dnd'],
				'dnd' => [
					'preventVoidMoves' => true,
					'preventRecursiveMoves' => true,
					'autoExpandMS' => 400,
					'dragStart' => new JsExpression('function(node, data) {
						return true;
					}'),
					'dragEnter' => new JsExpression('function(node, data) {
						return true;
					}'),
					'dragDrop' => new JsExpression('function(node, data) {
						data.otherNode.moveTo(node, data.hitMode);
					}'),
				],
			]
		]);
		?>
	</div>
</div>	

<div>Selected keys: <span id="echoSelection3">-</span></div>
<div>Selected root keys: <span id="echoSelectionRootKeys3">-</span></div>
<div>Selected root nodes: <span id="echoSelectionRoots3">-</span></div>
