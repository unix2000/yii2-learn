<?php
use yii\widgets\LinkPager;

?>
<h1>数据sort排序</h1>
<p><?=$sort->link('name')?> | <?=$sort->link('email')?></p>

<?php foreach ($models as $model): ?>
<div class="list-group">
    <h4 class="list-group-item-heading"> <?=$model->name ?>
        <label class="label label-default"><?= $model->email ?></label>
    </h4>
    <p class="list-group-item-text"><?=$model->address ?></p>
</div>
<?php endforeach ?>
<?= LinkPager::widget(['pagination' => $pages]); ?>