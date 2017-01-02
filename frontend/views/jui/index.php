<?php
use yii\jui\Tabs;
use yii\jui\Spinner;
use yii\jui\Accordion;
use yii\jui\Dialog;
use yii\jui\DatePicker;
use yii\jui\Selectable;
use yii\jui\Sortable;
use yii\jui\Droppable;
use yii\jui\ProgressBar;
use yii\jui\AutoComplete;

?>

<h1>Jui Asset</h1>
<?php
echo Tabs::widget([
    'items' => [
    	[
            'label' => '标签1',
            'content' => '标签1内容...',
        ],
        [
            'label' => '标签2',
            'content' => '标签2内容...',
            'options' => ['tag' => 'div'],
            'headerOptions' => ['class' => 'my-class'],
        ],
        [
            'label' => '标签3',
            'content' => '标签3内容...',
            'options' => ['id' => 'my-tab'],
        ],
        [
            'label' => 'Ajax tab',
            'url' => ['ui/ajax-form'],
        ],
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['class' => 'my-class'],
    'clientOptions' => ['collapsible' => false],
]);

echo Spinner::widget([
    'name'  => 'country',
    'clientOptions' => ['step' => 2],
]);

echo Accordion::widget([
    'items' => [
        [
            'header' => 'Section 1',
            'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
        ],
        [
            'header' => 'Section 2',
            'headerOptions' => ['tag' => 'h3'],
            'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
            'options' => ['tag' => 'div'],
        ],
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['tag' => 'h3'],
    'clientOptions' => ['collapsible' => false],
]);

Dialog::begin([
    'clientOptions' => [
        'modal' => true,
    ],
]);
echo 'Dialog contents here...';
Dialog::end();

echo DatePicker::widget([
    'attribute' => 'from_date',
    'language' => 'zh-cn',
    'dateFormat' => 'yyyy-MM-dd',
]);

ProgressBar::begin([
    'clientOptions' => ['value' => 75],
]);
echo '<div class="progress-label">Loading...</div>';
ProgressBar::end();

echo AutoComplete::widget([
    'name' => 'country',
    'clientOptions' => [
        'source' => ['USA', 'RUS'],
    ],
]);