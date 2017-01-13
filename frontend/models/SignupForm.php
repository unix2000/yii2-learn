<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // ['username', 'filter', 'filter' => 'trim'],
            // ['username', 'required'],
            [['username','email','password'],'required'],
            [['username','email','password'], 'filter', 'filter' => 'trim'],

            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            // ['email', 'filter', 'filter' => 'trim'],
            // ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'validateTime'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            // ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function validateTime($attributes, $params)
    {
        $currentTime = strtotime('now');
        $openTime = strtotime('9:00');
        $closeTime = strtotime('17:00');
        if ($currentTime > $openTime && $currentTime < $closeTime)
            return true;
        else
            $this->addError('email', 'The user\'s email address canonly be changed between 9 AM and 5 PM');
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
