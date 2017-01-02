<?php use yii\bootstrap\Alert; ?>

<div class="users-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>user modules</h1>
        <?php 
            //widget调用
            echo Alert::widget([
                'options' => [
                    'class' => 'alert-info',
                ],
                'body' => 'This is a bootstrap alert widget using widget()',
            ]);

            //begin() end()调用
            $widget = Alert::begin([
                'options' => [
                    'class' => 'alert-warning',
                ],
            ]);
            echo 'This is an bootstrap3 alert widget warning using begin() and end()';
            $widget->end();
        ?>
    </div>
</div>

<div class="row">
  <div class="col-md-6 col-md-offset-3">.col-md-6 .col-md-offset-3</div>
</div>
