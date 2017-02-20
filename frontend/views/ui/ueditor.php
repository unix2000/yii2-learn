<?php
use \kucha\ueditor\UEditor;

?>
<h1>百度编辑器ueditor</h1>
<div class="uk-grid">
	<div class="uk-width-3-5 uk-container-center">
		<?php
			echo UEditor::widget([
				'name' => 'editor',
			    'clientOptions' => [
			        //编辑区域大小
			        'initialFrameHeight' => '200',
			        //设置语言
			        'lang' =>'zh-cn', //中文为 zh-cn
			        //定制菜单
			        'toolbars' => [
			            [
			                'fullscreen', 'source', 'undo', 'redo', '|',
			                'fontsize',
			                'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
			                'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
			                'forecolor', 'backcolor', '|',
			                'lineheight', '|',
			                'indent', '|'
			            ],
			        ]
			    ]
			]);
		?>
	</div>
</div> 