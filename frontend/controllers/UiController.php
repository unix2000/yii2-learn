<?php
namespace frontend\controllers;
use kartik\mpdf\Pdf;
use frontend\models\RegForm;
use yii\web\Response;
use yii\web\Controller;

class UiController extends Controller{
    public function actionGallery(){
        return $this->render('gallery');
    }
    public function actionHighcharts(){
        return $this->render('charts');
    }
    public function actionFancytree(){
        return $this->render('fancytree');
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
        if($model->validate()){

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
}