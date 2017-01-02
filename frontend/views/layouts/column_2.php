<?php $this->beginContent('@app/views/layouts/main.php');?>
<div class="left_column">
	left_column
	<?= $content ?>
</div>

<div class="right_column">
	right_column
</div>
<?php $this->endContent();?>