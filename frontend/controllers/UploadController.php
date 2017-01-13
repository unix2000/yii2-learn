<?php
namespace frontend\controllers;
use frontend\models\UploadImg;
use frontend\models\Items;
use yii\web\UploadedFile;
use yii\web\Response;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\web\Controller;

class UploadController extends Controller {
    public function actionBootstrapImg()
    {
        return $this->render('bootstrap-img');
    }
    public function actionIndex(){
    	// $id = $this->request->get('id');
        $id = \Yii::$app->request->get('id');
    	$model = new Items();
        return $this->render('index',array(
        	'model'=> $model,
        	'id' => $id,
        ));
    }
    public function actionUpload($id) {
    	$data = Items::findOne($id);
    	if (!$data) { 
    		throw new NotFoundHttpException("404页面"); 
    	} 
    	$picture = new Items(['scenario' => 'upload']); 
    	$picture->id = $id; 
    	$picture->images_upload = UploadedFile::getInstance($picture, 'images_upload');
    	if ($picture->images_upload !== null && $picture->validate(['images_upload'])) { 
    		\Yii::$app->response->getHeaders()->set('Vary', 'Accept'); 
    		\Yii::$app->response->format = Response::FORMAT_JSON; 
    		$response = []; 
    		if ($picture->save(false)) { 
    			// THIS IS THE RESPONSE UPLOADER REQUIRES! 
    			$response['files'][] = [ 
    				'name' => $picture->images_upload->name, 
    				'type' => $picture->images_upload->type, 
    				'size' => $picture->images_upload->size, 
    				'url' => $picture->getImageUrl(), 
    				//'thumbnailUrl' => $picture->getImageUrl(TourPicture::SMALL_IMAGE), 
    				'deleteUrl' => Url::to(['delete', 'id' => $picture->id]), 
    				'deleteType' => 'POST' 
    			]; 
    		} else { 
    			$response[] = ['error' => 'Unable to save picture'];
    		} 
    		@unlink($picture->images_upload->tempName); 
    	} else { 
    		if ($picture->hasErrors(['picture'])) {
    			$response[] = ['error' => HtmlHelper::errors($picture)]; 
    		} else { 
    			throw new HttpException(500, 'Could not upload file.'); 
    		} 
    	} 
    	return $response;
    }
}