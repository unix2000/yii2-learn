<?php
namespace frontend\controllers;
use kartik\mpdf\Pdf;
use frontend\models\RegForm;
use yii\web\Response;
use yii\web\Controller;
use dosamigos\qrcode\QrCode;
use frontend\models\Items;
use frontend\models\Dept;
use yii\base\Security;
use yii\web\UploadedFile;
use yii\captcha\CaptchaValidator;

class UiController extends Controller{
	//public $enableCsrfValidation = false; //数据无法正确验证提交,不建议关闭csrf
	public function actions()
	{
	    return [
	       
	    ];
	}
	public function actionUeditor()
	{
		return $this->render('ueditor');
	}
	public function actionLogin()
	{
	    return $this->render('login'); 
	}
	public function actionLoginCheck()
	{
	    $req = \Yii::$app->getRequest();
	    if ($req->isAjax) {
	        $data = $req->post('username');
	        $verify = $req->post('verify');
	        //手工验证验证码
	        $captcha = new CaptchaValidator();
	        // if ($captcha->validate($verify)) //永远为false 诡异
	        //     $info = '验证码错误';
	        $info = '返回信息';
	        echo json_encode([
	            'status' => 0,
// 	            'info' => '登陆成功',
	            'info' => $info,
	            'url' => '/site/index',
	            'data' => $data
	        ]);
	    }
	}
	public function actionTests()
	{
// 		du(\Yii::$app->getSession());
//         du(\Yii::$app->getSession());
//         $value = "jngl";
// 	    $captcha = new CaptchaValidator();
// 	    du($captcha->validate($value));
	    return $this->render('tests');
	}
	public function actionRepeatable()
	{
		return $this->render('repeatable');
	}
	public function actionRepeat()
	{
		return $this->render('repeat');
	}
	public function actionStore(){
		$req = \Yii::$app->request;
		//数据已正确获取
		du($req->post());
		
		//restful post put
		// du($req->bodyParams); 
		// $req->getBodyParam('name')
	}
	
	public function actionAjaxForm()
	{
		return $this->renderPartial('ajax-form');
	}
	
	public function actionAjaxSubmit()
	{
	    return $this->render('ajax-submit');
	}
	public function actionAjaxStore(){
	    $req = \Yii::$app->getRequest();
	    if ($req->isAjax) {
// 	        echo 'ok-ok';
            $data = $req->post();
            $attach = UploadedFile::getInstanceByName('attach');
            if ($attach) 
                echo 'attach ok';
//             echo json_encode($data);
	    }
	}
	//jquery datatables
	public function actionDatatables()
	{
		return $this->render('datatables');
	}
	public function actionTableData()
	{
		$req = \Yii::$app->getRequest();
		if($req->isAjax) {
			$draw = $req->get('draw');
			$start = $req->get('start');
			$length = $req->get('length');
			$search = $req->get('search');
			$value = $search['value'];
			$map = array();
			if ( $value ) {
				$map = ['like', 'name', $value];
			}
			$data = Items::find()
				->select(['id','name','email','address'])
				->where($map) //使用addWhere
				->offset($start)
				->limit($length)
				->asArray()
				->all();
			$recordsFiltered = Items::find()
				->select(['id','name','email','address'])
				->where($map)
				->count();
			echo json_encode([ 
				'data' => $data,
				'recordsTotal' => $recordsFiltered,
				'draw' => $draw,
				'recordsFiltered' => $recordsFiltered
			]);
		}
		//du($data);
	}
	public function actionLayout()
	{
		return $this->render('layout');
	}
    public function actionBui()
    {
        return $this->render('bui');
    }
	public function actionDtgrid(){
		return $this->render('dtgrid');
	}
	//dtGrid数据生成
	public function actionDatas()
	{
		//ajax获取必须返回Pager对象,非ajax获取返回json数组即可
		// {"advanceQueryConditions":[],"advanceQuerySorts":[],"exhibitDatas":[],"exportAllData":false,"exportColumns":[],"exportDataIsProcessed":false,"exportDatas":[],"exportFileName":"","exportType":"","fastQueryParameters":{},"isExport":false,"isSuccess":true,"nowPage":1,"pageCount":20,"pageSize":10,"parameters":{},"recordCount":200,"startRecord":0}
		//dtGrid使用
		$req = \Yii::$app->getRequest();
		if ($req->isAjax){
			// $data = array();
			$dtpage = $req->post('gridPager'); //传过来是json对象
			$dt_arr = json_decode($dtpage,true);
			$page = $dt_arr['pageSize'];
			$startRecord = $dt_arr['startRecord'];
			// $nowPage = $dt_arr['nowPage'];
			// $callback = $req->post('callback');
			$data = Items::find()
				->offset($startRecord)
				->limit($page)
				->asArray()
				->all();
			$data['exhibitDatas'] = $data;		
			$data['isSuccess'] = true; //此参数ajax分页很重要,要不提示callback错误 很奇怪 因为不是jsonp获取
			//以下三参数必须加入,要不前端出现undefine错误
			$data['recordCount'] = Items::find()->count();
			$data['pageCount'] = (int)(Items::find()->count() / $page);
			$data['pageSize'] = $page;
			$data['startRecord'] = $dt_arr['startRecord'];
			$data['nowPage'] = $dt_arr['nowPage'];
			echo json_encode($data);
			// echo $callback.'('.json_encode($data).')';  
		}
	}
	public function actionZtree(){
		//简单数据格式,js设置
		/**
		var setting = {
			data: {
                simpleData: {
                    enable: true
                }
            },
		}
		**/
		$data = Dept::find()
			->select(['id','dept_parent as pId','dept_name as name'])
			->asArray()
			->all();
		$json = json_encode($data);
		return $this->render('ztree',[
			'data' => $json
		]);
	}
	public function actionOutlook()
	{
		//$data = Dept::find()
			//->select(['id','dept_parent as pId','dept_name as name'])
			//->orderBy('dept_parent')
			//->asArray()
			//->all();
		//$json = json_encode($data);
		//return $this->render('outlook',[
			//'data' => $json
		//]);
		return $this->render('outlook');
	}
	public function actionSemantic(){
		return $this->render('semantic');
	}
    public function actionQr(){
        return $this->render('qcode');
    }
    public function actionQrcode(){
        return QrCode::jpg('这是一条中文文字信息');
        //return QrCode::png('http://www.qq.com?from=cn');
    }
    public function actionGallery(){
        return $this->render('gallery');
    }
    public function actionHighcharts(){
        return $this->render('charts');
    }
    public function actionFancytree(){
        return $this->render('fancytree');
    }
	//fancytree树数据
	public function actionTreeDatas($root = 0){
		$data = Dept::find()
			->select(['id as key','dept_name as title'])
			->where([ 'dept_parent' => $root ])->asArray()->all();
		//echo json_encode($data);
		//du($data);
	}
    public function actionEcharts(){
        return $this->render('echarts');
    }
    public function actionIndex(){
        //return $this->render('index');
        //dump(\Yii::createObject(Pdf::className()));
        dump(\Yii::createObject(Response::className()));
        echo "<br />";
        $data = [
            'FromUserName' => 'oauth_id_abcdefgh',
            'ToUserName' => 'oauth_id_ijklmnopqrst',
        ];
        $response = \Yii::createObject([
            'class' => Response::className(),
            'format' => Response::FORMAT_XML,
            'data' => $data
        ]);
        dump($response);
    }
    public function actionDialog(){
        return $this->render('dialog');
    }
    public function actionJui(){
        $model = new RegForm();
        return $this->render('jui',array('model'=>$model));
    }
    public function actionValid(){
        $model = new RegForm();
        //dump(\Yii::$app->request->post());
        //$data = \Yii::$app->request->post('RegForm');
        $data = \Yii::$app->request->post('RegForm',[]);
        //echo $data['username'];
        dump($data);
        $model->attributes = \Yii::$app->request->post('RegForm');
        //$model->setAttribute(['other_value' => time()],true);       
        dump($model->attributes);
        //echo $model->validate() ? 'valid': 'no valid'; 
        if($model->load(\Yii::$app->request->post()) && $model->validate()){

        } else {
        	$errors = $model->errors;
        	dump($errors);
        }
//         if ($model->load(\Yii::$app->request->post()) && $model->isvalid()){
//             //save
//         } else {
//             dump($model->getErrors());
//             //ajax输出错误
//         }
    }
    public function actionPdf(){
        return $this->render('pdf');
    }
    public function actionMpdfDemo1() {
        $pdf = new Pdf([
            //'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'mode' => Pdf::MODE_UTF8,
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $this->renderPartial('privacy'),
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => [
                'title' => 'Krajee Report Title中文标题',
                'autoLangToFont' => true,    //这几个配置加上可以显示中文
                'autoScriptToLang' => true,  //这几个配置加上可以显示中文
                'autoVietnamese' => true,    //这几个配置加上可以显示中文
                'autoArabic' => true,        //这几个配置加上可以显示中文
            ],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Krajee Report Header中文报表'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        return $pdf->render();
    }
    //ajax get html form
    public function actionAjaxLoad()
    {
    	return $this->render('ajax-load');
    }
}