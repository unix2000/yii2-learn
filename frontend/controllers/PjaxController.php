<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\base\Security;
use Yii;

class PjaxController extends Controller 
{
	//pjax examples
	public function actionIndex()
	{
		return $this->render('index', ['response' => date('H:i:s')]);
	}
	public function actionTime()
	{
	    return $this->render('index', ['response' => date('H:i:s')]);
	}

	public function actionDate()
	{
	    return $this->render('index', ['response' => date('Y-M-d')]);
	}
	public function actionMultiple()
	{
	    $security = new Security();
	    $randomString = $security->generateRandomString();
	    $randomKey = $security->generateRandomKey();
	    return $this->render('multiple', [
	        'randomString' => $randomString,
	        'randomKey' => $randomKey,
	    ]);
	}
	public function actionFormSubmission()
	{
	    $security = new Security();
	    $string = Yii::$app->request->post('string');
	    $stringHash = '';
	    if (!is_null($string)) {
	        $stringHash = $security->generatePasswordHash($string);
	    }
	    return $this->render('form-submission', [
	        'stringHash' => $stringHash,
	    ]);
	}
	public function actionAutoRefresh()
	{
	    return $this->render('auto-refresh', ['time' => date('H:i:s')]);
	}
	public function actionVote()
	{
	    return $this->render('vote');
	}

	public function actionUpvote()
	{
	    $votes = Yii::$app->session->get('votes', 0);
	    Yii::$app->session->set('votes', ++$votes);
	    return $this->render('vote');
	}

	public function actionDownvote()
	{
	    $votes = Yii::$app->session->get('votes', 0);
	    Yii::$app->session->set('votes', --$votes);
	    return $this->render('vote');
	}
}