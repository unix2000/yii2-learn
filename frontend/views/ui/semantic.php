<?php 
use Zelenin\yii\SemanticUI\modules\Modal;
use Zelenin\yii\SemanticUI\helpers\Size;
use Zelenin\yii\SemanticUI\Elements;
use Zelenin\yii\SemanticUI\modules\Tab;
use Zelenin\yii\SemanticUI\modules\Search;
use Zelenin\yii\SemanticUI\modules\Shape;
use Zelenin\yii\SemanticUI\modules\Select;
use Zelenin\yii\SemanticUI\modules\Dropdown;
use Zelenin\yii\SemanticUI\collections\Breadcrumb;
use yii\helpers\Html;
use Zelenin\yii\SemanticUI\modules\Progress;

echo Elements::button('Save', ['class' => 'primary']);
echo Elements::button('Discard');

/*
 * semantic.js与bootstrap.js冲突,无法正确渲染
 */
echo Tab::widget([
    'items' => [
        [
            'label' => 'Tab 1',
            'content' => 'Tab 1 content'
        ],
        [
            'label' => 'Tab 2',
            'content' => 'Tab 2 content',
            'active' => true
        ],
        [
            'label' => 'Tab 3',
            'content' => 'Tab 3 content'
        ],
        [
            'label' => 'Tab 4',
            'content' => 'Tab 4 content'
        ]
    ]
]);
echo Elements::input(
    Html::input('text', null, null, ['placeholder' => 'Search…']) . Elements::icon('search'),
    ['class' => 'left icon loading']
);

use Zelenin\yii\SemanticUI\modules\CheckboxList;
echo Html::tag('div', CheckboxList::widget([
	'items' => [
		'value1' => 'Label1',
		'value2' => 'Label2',
		'value3' => 'Label3',
		'value4' => 'Label4'
	],
	'name' => 'checkboxListName1'
]), ['class' => 'ui form']);

use Zelenin\yii\SemanticUI\modules\RadioList;
echo Html::tag('div', RadioList::widget([
	'items' => [
		'value1' => 'Label1',
		'value2' => 'Label2',
		'value3' => 'Label3',
		'value4' => 'Label4'
	],
	'name' => 'radioListName1'
]), ['class' => 'ui form']);

use Zelenin\yii\SemanticUI\modules\Rating;
echo Rating::widget([
    'type' => Rating::TYPE_HEART,
    'clientOptions' => [
        'initialRating' => 5,
        'maxRating' => 10
    ]
]);
