<?php
namespace frontend\components;

use yii\base\Component;
use yii\base\Event;


class MessageEvent extends Event{
    public $message;
}

class FooEvent extends Component {
    //属性,行为以及事件 Component
    const EVENT_HELLO = 'hello';
    
    public function bar(){
        $this->trigger(self::EVENT_HELLO);
    }
}

class Mailer extends Component {
    const EVENT_MESSAGE_SENT = 'messageSent';

    public function send($message){
        // ...sending $message...
        $event = new MessageEvent;
        $event->message = $message;
        $this->trigger(self::EVENT_MESSAGE_SENT, $event);
    }
}