<?php
namespace frontend\controllers;

use yii\web\Controller;
// use yii\di\Container as DI;
use yii\di\Container;
use frontend\models\UserFinder;
use frontend\models\UserLister;
use yii\di\ServiceLocator;

class DiController extends Controller {
    public function actionIndex(){
        //di injection
        //phalcon 
//         $di->set('db',function(){
//         	return new someclass();
//         });
// 		$this->db;
		
    	//first
    	$container = new Container;
// 		$container->set('dbs', 'yii\db\Connection');
// 		$container->set('dbtests',[
// 			'class' => 'yii\db\Connection',
// 			'dsn' => 'mysql:host=localhost;dbname=yii2adv',
// 			'username' => 'root',
// 			'password' => 'root',
// 			'charset' => 'utf8'
// 		]);
// 		//dump($container->get('dbs'));
// 		$dbs = $container->get('dbtests');
// 		$q = $dbs->createCommand('select i.name,i.email from items as i limit 0,10');
// 		dump($q->queryAll());
		
		//second: callable - get() receive three variables
//     	$container->set('dbtests', function ($c, $params, $config) {
// //     		dump($c);
//     		dump($params);
//     		//dump($config);
//     		return new \yii\db\Connection($config);
//     	});
//     	if ($container->has('dbtests')){
//     		echo 'dbtests is true';
//     	}
//     	//dump($container->get('dbtests'));
//     	$dbs = $container->get('dbtests',[1,2,3],[
//     		'dsn' => 'mysql:host=localhost;dbname=yii2adv',
//     		'username' => 'root',
//     		'password' => 'root',
//     		'charset' => 'utf8'
//     	]);
//     	$q = $dbs->createCommand('select i.name,i.email from items as i limit 0,10');
//     	dump($q->queryAll());
		

		//another examples 
		//自动解决依赖关系
    	$container->set('yii\db\Connection', [
    		'dsn' => 'mysql:host=localhost;dbname=yii2adv',
    		'username' => 'root',
    		'password' => 'root',
    		'charset' => 'utf8'    		
    	]);
    	$container->set('frontend\models\UserFinderInterface', [
    		'class' => 'frontend\models\UserFinder',
    	]);
    	$container->set('userLister', 'frontend\models\UserLister');
    	
    	$lister = $container->get('userLister');
    	//dump($lister);
    	//dump($lister->finder);
    	
    	//equivalent above
//     	$db = new \yii\db\Connection([
//     		'dsn' => 'mysql:host=localhost;dbname=yii2adv',
//     		'username' => 'root',
//     		'password' => 'root',
//     		'charset' => 'utf8'    			
//     	]);
//     	$finder = new UserFinder($db);
//     	$lister = new UserLister($finder);
// //     	dump($lister);
//     	dump($lister->finder);

    	//ServiceLocator application \Yii::$app
    	$locator = new ServiceLocator();
		$cache = $locator->set('cache', 'yii\caching\ApcCache');
    	if ($locator->has('cache')){
    		echo 'cache is registered';
    	}
//     	dump($locator->get('cache'));
		dump(\Yii::$app->mongodb);
    }
}
