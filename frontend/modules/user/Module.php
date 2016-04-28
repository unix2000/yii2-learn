<?php

namespace frontend\modules\user;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'frontend\modules\user\controllers';
    public $enableRegistration = true;
    public $version = "0.1";

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
