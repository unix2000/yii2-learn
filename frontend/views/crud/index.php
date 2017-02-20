<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

/*
 * @var yii\web\View $this
 * @var yii\data\Pagination $pages
 * @var array $models
 */

?>
<h1>数据列表--<?php echo ($modelClass) ?></h1>
<?= Html::a('+ 新增', Url::toRoute('items/create')); ?>

<?php foreach ($models as $model):?>
    <h3><?= Html::encode($model->name);?></h3>
    <p><?= Html::encode($model->email);?></p>

    <p>
        <?= Html::a('view', Url::toRoute(['items/view', 'id' => $model->id]));?> |
        <?= Html::a('delete', Url::toRoute(['items/delete', 'id' => $model->id]));?>
    </p>
<?php endforeach; ?>

<?= LinkPager::widget([
    'pagination' => $pages,
]); ?>