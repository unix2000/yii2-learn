<h1>react javascript library</h1>
<?php
//需要重写registerBabel,改成<script type="text/babel">
$this->beginBlock('js');

?>


<?php 
$this->endBlock();
$this->registerJs($this->blocks['js'],\yii\web\View::POS_END);
?>