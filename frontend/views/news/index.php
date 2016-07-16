<?php
use yii\helpers\Url;

foreach ($data as $v){

?>
	<a href="<?php  echo Url::to(['news/view', 'slug' => $v->slug]);?>">
		<?php echo $v->title . "<br />"; ?>	
	</a>

<?php
}

?>