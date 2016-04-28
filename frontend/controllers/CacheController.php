<?php
namespace frontend\controllers;
use frontend\models\RedisModel;
use yii\data\Pagination;
use frontend\models\MongoModel;
use yii\mongodb\Query;
use yii\data\ActiveDataProvider;

class CacheController extends BaseController {
    public function actionIndex(){
        
    }
    public function actionMongo(){
//         dump(\Yii::$app->mongodb);
        $model = new MongoModel();
//         $model->name = 'xiexiaolin';
//         $model->email = 'linux8000@qq.com';
//         $model->address = '南昌xx大道';
//         $model->status = 2;
//         $result = $model->save();
//         dump($result);
//         $data = $model->find()->asArray()->all();
//         dump($data);
//         $query = new Query();
//         $query->from('customer')->where(['status'=>2]);
//         $provider = new ActiveDataProvider([
//             'query' => $query,
//             'pagination' => [
//                 'pageSize' => 10,
//             ]
//         ]);
        $provider = new ActiveDataProvider([
            'query' => MongoModel::find(),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);
        $model = $provider->getModels();
        dump($model);
    }
    public function actionRedis(){
        set_time_limit(0);
        $redis = \Yii::$app->redis;
//         $redis->set('username','liner-中文');
//         dump($redis->get('username'));
        //$redis->flushall();
        $model = new RedisModel();
//         $model->attributes = [
//             'id' => 2,
//             'name' => 'xiexiaolin-',
//             'address' => '南昌xx大道-',
//             'registration_date' => '2015-01-02',
//         ];
//         $model->id =2;
//         $model->name = 'xiexiaolin----';
//         $model->address = '南昌xx大道---';
//         $model->registration_date = '2015-02-01';
//         if($model->validate()){
//             $result = $model->save();
//         } else {
//             dump($model->getErrors());
//         }
//         dump($result);
        //插入数据,10000条数据四个字段reids内存占用3M
//         for ( $i=1; $i < 10001; $i++ ){
//             $model->id = $i;
//             $model->name = 'xiexiaolin'.$i;
//             $model->address = 'address中文---'.$i;
//             $model->registration_date = '2015-02-03';
//             $model->insert();
//         }
        //dump(RedisModel::find()->limit(50)->asArray()->all()); 
        $query = RedisModel::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
        
        return $this->render('redis', [
            'models' => $models,
            'pages' => $pages,
        ]);
    }
}