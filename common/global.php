<?php
// use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use frontend\models\Dept;


function json_output($data){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    return $data;
}

function xml_output($data){
    \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
    return $data;
}
//all get
function app(){
    return \Yii::$app;
}

function req(){
    return app()->getRequest();
}

function res(){
    return app()->getResponse();
}

function session(){
    return app()->getSession();
}

function cookies(){
    return res()->getCookies();
}

function res_cookies(){
    return req()->getCookies();
}

function db(){
    return app()->getDb();
}

function du($var, $echo=true, $label=null, $strict=true) {
    $label = ($label === null) ? '' : rtrim($label) . ' ';
    if (!$strict) {
        if (ini_get('html_errors')) {
            $output = print_r($var, true);
            $output = "<pre>" . $label . htmlspecialchars($output, ENT_QUOTES) . "</pre>";
        } else {
            $output = $label . print_r($var, true);
        }
    } else {
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        if (!extension_loaded('xdebug')) {
            $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
            $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
        }
    }
    if ($echo) {
        echo($output);
        return null;
    }else
        return $output;
}

//全局函数事件绑定测试
function globals_tests($param){
    //echo $param->data.'<br />';
    dump($param->data);
}

function childs($id = 0)
{
    //bui tree格式数据,暂用dept，模型为id，pid结构
    $data = Dept::find()
        //->select(['id as key','dept_name as title'])
        ->select([ 'id' , 'dept_name' ])
        ->where([ 'dept_parent' => $id ])->asArray()->all();
    $arr = array();
    foreach ( $data as $k => $v ) {
        $arr[$k]['id'] = $v['id'];
        $arr[$k]['text'] = $v['dept_name'];
        $count = Dept::find()->where([ 'dept_parent' => $v['id'] ])->count();
        if( $count > 0 ) {
//             $arr[$k]['expanded'] = true;
            $arr[$k]['children'] = childs($v['id']);
        }
    }
    return $arr;
}