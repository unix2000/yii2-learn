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

?>

<div class="uk-grid">
    <div class="uk-width-2-5">
        <div class="ui top attached tabular menu">
          <a class="item" data-tab="first">First</a>
          <a class="item active" data-tab="second">Second</a>
          <a class="item" data-tab="third">Third</a>
        </div>
        <div class="ui bottom attached tab segment" data-tab="first">
          First
        </div>
        <div class="ui bottom attached tab segment active" data-tab="second">
          Second
        </div>
        <div class="ui bottom attached tab segment" data-tab="third">
          Third
        </div>
    </div>
    <div class="uk-width-3-5 uk-container-center">
        <form class="ui form error">
          <div class="two fields">
            <div class="field error">
              <label>Integer</label>
              <input name="integer" type="text" value="101">
            </div>
            <div class="field">
              <label>E-mail</label>
              <input name="email" type="text" value="jack@foo">
            </div>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Decimal</label>
              <input name="decimal" type="text" value="1.1.1">
            </div>
            <div class="field error">
              <label>Number</label>
              <input name="number" type="text" value="+200">
            </div>
          </div>
          <div class="two fields">
            <div class="field error">
              <label>URL</label>
              <input name="url" type="text" value="ww.fakeurl.com">
            </div>
            <div class="field error">
              <label>RegEx</label>
              <input name="regex" type="text" value="joe">
            </div>
          </div>
          <div class="ui submit button">Submit</div>
        </form>
    </div>
</div>

<?php 
$js = <<< JS
    $('.menu .item').tab();
    
   $('.form')
  .form({
    on: 'blur',
    inline: true,
    fields: {
      integer: {
        identifier  : 'integer',
        rules: [
          {
            type   : 'integer[1..100]',
            prompt : '请输入一个1到100的整数'
          }
        ]
      },
      decimal: {
        identifier  : 'decimal',
        rules: [
          {
            type   : 'decimal',
            prompt : '请输入小数'
          }
        ]
      },
      number: {
        identifier  : 'number',
        rules: [
          {
            type   : 'number',
            prompt : '请输入数字'
          }
        ]
      },
      email: {
        identifier  : 'email',
        rules: [
          {
            type   : 'email',
            prompt : '请输入一个合法的email'
          }
        ]
      },
      url: {
        identifier  : 'url',
        rules: [
          {
            type   : 'url',
            prompt : '请输入网址'
          }
        ]
      },
      regex: {
        identifier  : 'regex',
        rules: [
          {
            type   : 'regExp[/^[a-z0-9_-]{4,16}$/]',
            prompt : '请输人4-16位字母'
          }
        ]
      }
    }
  })
;
JS;
$this->registerJs($js);
?>
