<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Items;
use yii\helpers\Json;

class BuiController extends Controller 
{
    public function actionEditor()
    {
//         $header = ['报销内容', '报销日期', '报销金额', '报销备注'];
        //测试数据，对应数据表相应字段
        $data = [
            [
                'name' => 'bxc',
                'title' => '报销内容',
                'required' => true,
                'xtype' => 'select',
                'width' => 180
            ],
            [
                'name' => 'bxdate',
                'title' => '报销日期',
                'required' => true, 
                'xtype' => 'date',
                'width' => 100
            ],
            [
                'name' => 'bxnum',
                'title' => '报销金额',
                'required' => true,
                'xtype' => 'number',
                'width' => 80
            ],
            [
                'name' => 'bxdes',
                'title' => '报销备注',
                'required' => true,
                'xtype' => 'text',
                'width' => 200,
            ],
        ];
        $arr = array();
        foreach ($data as $k => $v) {
            $arr[$k]['title'] = $v['title'];
            $arr[$k]['dataIndex'] = $v['name'];
            $arr[$k]['width'] = $v['width'];
            $arr[$k]['editor'] = [
                'xtype' => $v['xtype'],
                'rules' => [
                    'required' => $v['required']
                ],
            ];
            if ($v['xtype'] == 'select') {
                $arr[$k]['editor']['id'] = 'mySelect';
                $arr[$k]['editor']['items'] = 'enumObj';
                $arr[$k]['renderer'] = 'Grid.Format.enumRenderer(enumObj)';
            }
            if ($v['xtype'] == 'date') {
                $arr[$k]['renderer'] = 'Grid.Format.dateRenderer';
            }
        }
//         $xtypes = ['text', 'number', 'date', 'select'];
        //text number date select
        //check checkbox checklist
        //hidden list plain radio
        //radiolist readonly textarea upload
        $json = Json::encode($arr);
        $json = str_replace('"Grid.Format.enumRenderer(enumObj)"', 'Grid.Format.enumRenderer(enumObj)', $json);
        $json = str_replace('"enumObj"', 'enumObj', $json);
        $json = str_replace('"Grid.Format.dateRenderer"', 'Grid.Format.dateRenderer', $json);
//         echo $json;
        return $this->render('editor',[
            'json' => $json
        ]);
    }
    public function actionGridBuilder()
    {
        //表格编辑选项json,自定义编辑表单
//         editor : {xtype : 'text',validator : validFn}
//         xtype: text number date select 
        $arr = array();
        $db = \Yii::$app->db;
//         $tables = \Yii::$app->db->createCommand('SHOW TABLES')->queryAll();
//         $table = \Yii::$app->db->createCommand('desc user')->queryAll();
//         $tables = $db->createCommand('show tables from yii2adv')->queryAll();
        $table = $db->createCommand('show columns from items')->queryAll();
//         $table = $db->createCommand('desc items')->queryAll();
        du($table);
        foreach ($table as $k => $v) {
            $arr[$k]['title'] = $v['Field'];
            $arr[$k]['dataIndex'] = $v['Field'];
            $arr[$k]['width'] = 100;
        }
        $json = Json::encode($arr);
        return $this->render('grid-builder',[
            'json' => $json,
        ]);
//         echo Json::encode($arr);
//         return $this->render('grid-builder');
    }
    
    public function actionMake()
    {
        //数据生产器
    }
    public function actionListbox()
    {
    	return $this->render('listbox');
    }
    public function actionGrid()
    {
        return $this->render('grid');
    }
    public function actionDatas()
    {
		$req = \Yii::$app->getRequest();
		if ($req->isAjax){
			$start = $req->get('start');
			$limit = $req->get('limit');
			$count = Items::find()->count();
			$data = Items::find()
				->select(['id','name','email','address','registration_date','images_upload','types_id'])
				->offset($start)
				->limit($limit)
				->asArray()
				->all();
			$arr = array();
			$arr['rows'] = $data;
			$arr['results'] = $count;
			$arr['hasError'] = false;
			echo json_encode($arr);
		}
    }
}