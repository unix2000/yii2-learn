<?php
namespace api\filters\auth;

use yii\filters\auth\AuthMethod;
use yii\web\UnauthorizedHttpException;

class HeaderParamAuth extends AuthMethod
{
    public $tokenParam = 'x-auth-token';
    public function authenticate($user, $request, $response){
        //如果为get 则http://api.dev/users?x-auth-token=BTuXe0uk8KxAOuoM-ymSxGtPOOPIaWp8
        //存入header头部
        $accessToken = $request->getHeaders()[$this->tokenParam];
//         $accessToken = $request->get($this->tokenParam);
        if (is_string($accessToken)) {
            $identity = $user->loginByAccessToken($accessToken,get_class($this));
        
            if ($identity !== NULL)
                return $identity;
        }
        
        if ($accessToken !== NULL)
            $this->handleFailure($response);
        
        return NULL;
    }
    
    public function handleFailure($response)
    {
        throw new UnauthorizedHttpException('您使用的token非法或过期，请重新验证！！');
    }
}