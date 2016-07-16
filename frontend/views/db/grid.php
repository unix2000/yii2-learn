<?php
use yii\grid\GridView;
use yii\base\Widget;
use yii\grid\CheckboxColumn;

//dump($data);

?>

<button class="btn btn-primary" id="gets">get ids</button>
<?php
echo GridView::widget([
    'options' => [
        'class' => 'grid-view col-md-8 col-md-offset-2',
        'style' => 'overflow:auto;width:720px',
        'id' => 'grid',
    ],
    'dataProvider'=> $data,
    //'layout' => '',
    'pager' => [
        //'options' => ['class' => 'hidden'],
        'firstPageLabel' => 'First',
        'prevPageLabel' => 'Prev',
        'nextPageLabel' => 'Next',
        'lastPageLabel' => 'Last',
    ],
    'columns' => [
        [
            'class' => 'yii\grid\CheckboxColumn',
            'name' => 'ids', //checkbox name ids[]
            'checkboxOptions' => function($model, $key, $index, $column) {
                return ['value' => $model['id']];
            }
        ],
        'id',
        'name',
        'email',
        'address'
    ],
]);

$this->registerJs('
    $("#gets").on("click",function(){
        var keys = $("#grid").yiiGridView("getSelectedRows");
        alert(keys);
    });    
');
?>



