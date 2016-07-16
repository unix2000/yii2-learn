<?php
/**
 * author:liner.xie
 * linux8000@qq.com
 */
namespace frontend\controllers;
use GuzzleHttp\Client;

class GuzzleController extends BaseController{  
    public function actionClient(){
        $client = new Client();
        //$client->setDefaultOption('verify', false);
        $res = $client->request('GET', 'https://api.github.com/user', [
            //request options
            //allow_redirects
            //auth,timeout,version
            //body,cert,cookies,connect_timeout,debug
            //decode_content,delay,expect,form_params
            //headers,http_errors,json,multipart,on_headers,on_stats
            //progress,proxy,query,sink,synchronous,ssl_key,stream
            'verify' => false,
            'auth' => ['xxx@qq.com','******']
        ]);
        //echo $res->getStatusCode();
        // 200
        //echo $res->getHeaderLine('content-type');
        // 'application/json; charset=utf8'
        //echo $res->getBody();
        //$data = json_decode($res->getBody(),true);
        $data = json_decode($res->getBody());
        //echo $data['plan']['name'];
        //echo $data->plan->name;
        // {"type":"User"...'
        
        // Send an asynchronous request.
        $request = new \GuzzleHttp\Psr7\Request('GET', 'http://www.oschina.net');
        $promise = $client->sendAsync($request)->then(function ($response) {
            echo 'I completed! ' . $response->getBody();
            //dump($response->getBody());
        });
        $promise->wait();
                
    }
}