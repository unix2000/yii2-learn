<?php
namespace frontend\components;

use yii\base\Component;
use yii\base\Event;

class FooEvent extends Component {
    const EVENT_HELLO = 'hello';
    
//     public function bar(){
//         $this->trigger(self::EVENT_HELLO);
//     }
}

// class hello extends Event {
//     public $message;
// }