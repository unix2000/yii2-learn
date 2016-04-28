<?php
use yii\helpers\Html;
echo Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> Privacy Statement', ['/ui/mpdf-demo-1'], [
    'class'=>'btn btn-danger',
    'target'=>'_blank',
    'data-toggle'=>'tooltip',
    'title'=>'Will open the generated PDF file in a new window'
]);
