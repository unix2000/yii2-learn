<?php

namespace frontend\modules\user;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\user\controllers';
    public $enableRegistration = true;
    public $version = "0.1";
    public $defaultRoute = 'default'; //默认控制器

    public function init()
    {
        parent::init();
        // custom initialization code goes here
        $this->params['a'] = 'b';
        \Yii::configure($this, require __DIR__ .'/config/config.php');
    }
}
