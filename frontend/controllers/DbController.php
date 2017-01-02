<?php
namespace frontend\controllers;

use frontend\models\Items,
yii\data\ActiveDataProvider,
yii\data\ArrayDataProvider,
yii\data\SqlDataProvider,
// use yii\db\Query as Q;
yii\db\Query;
use yii\web\Controller;
use frontend\models\Types;

class DbController extends Controller {
    public function actionShow(){
        // $db = \Yii::$app->db;
        // $db->createCommand()->insert($sql)->execute()
        // $db->createCommand()->update($sql)->execute()
        // $db->createCommand()->delete($sql)->execute();
        // $data = $db->createCommand('select id,name,email from items where id = :id')
        //     ->bindValue(':id',12)
        //     ->queryAll();
        // var_dump($data);
        // var_dump($db->createCommand());

        $q = (new Query);
        // $command = $q->select(['id','name','email'])
        //     ->from('items')
        //     ->where('id = :id',[':id'=>12])
        //     ->createCommand();
        $command = $q->from('items')
            ->where([
                // 'name' => 'liner.xie',
                'email' => 'liner.xie@qq.com',
                'id' => [20, 21, 22, 23, 24, 25, 26, 27, 28, 29],
            ])
            // ->andWhere(['like','name','xiexiaolin'])
            ->createCommand();
        var_dump($command->sql);
        var_dump($command->params);
        $rows = $command->queryAll();
        var_dump($rows);

    }
	public function actionTest(){
		// db function
		$count = Items::find()->count();
		//dump($count);
// 		dump(Items::find()->one());	 //all()
// 		dump(Items::find()->max('id')); //min()
// 		dump(Items::find()->average('id'));  //scalar
// 		dump(Items::find()->column());
// 		dump(Items::find()->batch(10));
// 		dump(Items::find()->each(10));
// 		$data = Items::find()
// 			->where(['email' => 'liner.xie@qq.com'])
// 			->asArray()
// 			->all();

        //batch() each()
		// foreach (Items::find()->where(['<','id',20])->batch(10) as $items){
		// 	//dump($v[0]);
  //           foreach ($items as $v) {
  //               echo $v->name. '|' . $v->address ."<br />";
  //           }
		// }
        // foreach (Items::find()->where(['<','id',20])->each(5) as $v) {
        //     dump($v->name);
        // }

		//sql
// 		$data = Items::findBySql("select a.name,a.email from items as a limit 0,10")->all();
// 		dump($data);

		//$this->db
		$db = \Yii::$app->db;
		//query() return DataReader
		//$data = $db->createCommand("select a.name,a.email from items as a limit 0,10")->query();
// 		$data = $db->createCommand("select a.name,a.email from items as a limit 0,10")->queryAll();
		//dump($data);

        //query builder
		//dump(new Query());
        $email = "liner.xie@qq.com";
        // $data = (new Query())
        //     ->select('id,name,email')
        //     ->from('items')
        //     // ->where(['<','id',20])
        //     //$query->where("email=$email"); //no that sql attach
        //     ->where('email=:email')
        //     ->addParams([':email' => $email])
        //     ->limit(10)
        //     ->all();
        // dump($data);

        //条件追加 andWhere
        $q = (new Query())
            ->select('id,name,email')
            ->from('items')
            ->where('email=:email',[':email'=>$email])
            ->limit(10);
        $name = "xiexiaolin11";
        if(!empty($name)){
            $q->andWhere(['like','name',$name]);
        }
        $data = $q->all();
        //dump($data);
		
        //where
        // $model = new Items();
//         Items::findOne(1);
        // $model->load(\Yii::$app->request->post());
        // echo __DIR__ . '|' .__FILE__ . '|' . __CLASS__ ."<br />";
        // echo __LINE__ . '|' . __FUNCTION__ . '|' . __METHOD__ ."<br />";
        // echo __NAMESPACE__ ;
        // echo __TRAIT__ ;

	}
	
	public function actionCache(){
	    /**
	     * @author liner
	     * db cache
	     */
	    
	}
    public function actionIndex(){
//         set_time_limit(0);
//         $model = new Items();
//         for ( $i=1; $i < 100001; $i++ ){
//             $model->name = 'xiexiaolin'.$i;
//             $model->email = 'liner.xie@qq.com';
//             $model->address = 'address中文---'.$i;
//             $model->registration_date = '2015-02-03';
//             $model->insert();
//         }
    }
    public function actionRelation(){
        //hasmany
        $data = Types::findOne(2);
        dump($data->items);
        
        //hasone
        // $data = Items::findOne(1);
        // dump($data->types);
    }
    public function actionProvider(){
        //array provider ArrayDataProvider
        $q = new Query();
        $provider_arr = new ArrayDataProvider([
            'allModels' => $q->from('items')->all(),
            'sort' => [
                'attributes' => ['id', 'name', 'email'],
            ],
            'pagination' => [
                'pageSize' => 15,
            ]
        ]);
//         $data = $provider_arr->getModels();
//         dump($data);
        
        //sql provider SqlDataProvider;
        $email = 'liner.xie@qq.com';
        $count = db()->createCommand('
            SELECT COUNT(*) FROM items WHERE email=:email    
        ',[':email' => $email])->queryScalar();
        
        $provider_sql = new SqlDataProvider([
            'sql' => 'SELECT a.id,a.name,a.email,a.address FROM items as a WHERE email=:email',
            'params' => [':email' => $email],
            'totalCount' => $count,
            'sort' => [
                'attributes' => [
                    'id',                    
                    'email',
                    'address',
                ],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        //dump($provider_sql->getModels());
        
        //active provider ActiveDataProvider
        $provider_active = new ActiveDataProvider([
            //'query' => Items::find(),
            //no active record
            'query' => $q->from('items'),
            'pagination' => [
                'pageSize' => 15
            ]
        ]);
        return $this->render('grid',[
            //'data' => $provider_active
            //'data' => $provider_sql
            'data' => $provider_arr,
        ]);
//         dump($provider_active->getModels());
    }
    public function actionTests(){
        //$data = Items::findOne(1);
//         $data = Items::findOne([
//             'id' => 2,
//             'email' => 'liner.xie@qq.com'
//         ]);
        //dump($data->address);
        //$data = Items::find()->limit(10)->asArray()->all();
//         $data = Items::find()
//             ->where(['id'=>1,'email'=>'liner.xie@qq.com'])
//             ->asArray()
//             ->one();
        //$data = Items::findBySql("select id,email from items limit 0,10")->all();
        
        dump($data); 
    }
}