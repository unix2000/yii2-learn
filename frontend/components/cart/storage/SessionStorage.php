<?php
namespace frontend\components\cart\storage;
use yii\web\Session;

class SessionStorage implements StorageInterface
{
    private $session;
    private $key;
    public function __construct(Session $session,$key)
    {
        $this->session = $session;
        $this->key = $key;
    }
    public function load()
    {
        return $this->session->get($this->key,[]);
    }
    public function save(array $items)
    {
        $this->session->set($this->key,$items);
    }
}