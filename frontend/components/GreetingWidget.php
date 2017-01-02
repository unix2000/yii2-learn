<?php
namespace frontend\components;

use yii\base\Widget;
use yii\helpers\Html;
class GreetingWidget extends Widget
{
    public $name = null;
    public $greeting;
    public function init()
    {
        parent::init();
        $hour = date('G');
        if ( $hour >= 5 && $hour <= 11 )
            $this->greeting = "早上好";
        else if ( $hour >= 12 && $hour <= 18 )
            $this->greeting = "下午好";
        else if ( $hour >= 19 || $hours <= 4 )
            $this->greeting = "晚上好";
    }
    public function run()
    {
        if ($this->name === null)
            return HTML::encode($this->greeting);
        else
            return HTML::encode($this->greeting . ',' . $this->name);
    }
}