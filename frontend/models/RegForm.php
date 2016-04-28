<?php
namespace frontend\models;
use yii\base\Model;

class RegForm extends Model {
    public $username;
    public $password;
    public $sex;
    public $edu;
    public $images;
    public $hobby;
    public $info;
    public $verifyCode;
    
    public function rules(){
        return [
            //[['username','password'],'required','message'=>'不能为空'],
            //['username','required','requiredValue'=>'必填值','message'=>'请输入用户名'],
            ['username','required','message'=>'请输入用户名'],
            ['username','unique'],
            //['username','match','pattern'=>'/^[\x{4e00}-\x{9fa5}]+$/u','message'=>'{attribute}必须为中文汉字'],
            ['password','required','message'=>'请输入密码'],
            [['username', 'password'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],
            //['file','file','extensions'=>['doc','pdf']],
            ['images','image', 
                'extensions' => 'png,jpg,jpeg',
                'minWidth' => 100,
                'maxWidth' => 1000,
                'minHeight' => 100,
                'maxHeight' => 1000,
            ],
            [['sex','edu','hobby','info'],'required'],
            ['verifyCode','captcha'],
            //其他验证
//             ['username', 'string', 'length' => [4, 24]], //字符串
//             [['from', 'to'], 'date'],//日期
//             ['字段名', 'boolean', 'trueValue' => true, 'falseValue' => false, 'strict' => true],//布尔值
//             ['salary', 'double'],//double双精度
//             ['salary', 'number'],//数值
//             ['age', 'integer'],//整数
//             ['level', 'in', 'range' => [1, 2, 3]],//范围
//             ['username', 'exist'],//确保存在于数据表中
//             ['age', 'default', 'value' => null],//default默认
//             ['age', 'compare', 'compareValue' => 30, 'operator' => '>='],//比较
//             ['description', 'safe'],//safe
//             ['email', 'email'],//email
//             ['website', 'url', 'defaultScheme' => 'http'],//http
        ];
    }
    public function attributeLabels(){
        return [
            'username' => '用户名',
            'password' => '密码',
            'images' => '图片附件',
        ];
    }
    public function isvalid(){
        if($this->validate()){
            return true;
        } else {
            return false;
        }
    }
}