<?php
// use dosamigos\fileupload\FileUpload; //without ui
use dosamigos\fileupload\FileUploadUI; //with ui

?>

<?= FileUploadUI::widget([
    'model' => $model,
	'attribute' => 'images_upload',
	'url' => ['upload/upload', 'id' => $id],
	'gallery' => false,
	'fieldOptions' => [
    		'accept' => 'image/*'
	],
	'clientOptions' => [
    		'maxFileSize' => 2000000
	],
	// ...
	'clientEvents' => [
	    'fileuploaddone' => 'function(e, data) {
	                            console.log(e);
	                            console.log(data);
	                        }',
        'fileuploadfail' => 'function(e, data) {
	                            console.log(e);
	                            console.log(data);
                            }',
    ],
]);
?>
