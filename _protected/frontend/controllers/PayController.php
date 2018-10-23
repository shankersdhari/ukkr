<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\Profile;
class PayController extends FrontendController
{
	public $enableCsrfValidation = false;
	public function actionSuccess(){
		if($_POST){
			$user_id = $_POST['udf1'];
			$profile = Profile::findOne($user_id);
			if($_POST["status"] == "success"){
				$profile->payment_status = "Success";
				$profile->transaction_id = $_POST['txnid'];
				$profile->save();
				Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Your Payment has been Completed!'));
				return $this->redirect(['/account/index']);
			}else
			if($_POST["status"] == "pending"){
				$profile->payment_status = "Pending";
				$profile->transaction_id = $_POST['txnid'];
				$profile->save();
				Yii::$app->getSession()->setFlash('success', Yii::t('app', 'Your Payment has been Pending!'));
				return $this->redirect(['/account/index']);
			}
		}
	}
	public function actionFailure(){
		if($_POST){
			$user_id = $_POST['udf1'];
			$profile = Profile::findOne($user_id);
			if($_POST["status"] == "failure"){
				$profile->payment_status = "Failure";
				$profile->transaction_id = $_POST['txnid'];
				$profile->save();
			}
			Yii::$app->getSession()->setFlash('danger', Yii::t('app', 'Your Payment has been Failed!'));
			return $this->redirect(['/account/index']);
		}	
	}
	public function actionCancel(){
		if($_POST){
			$user_id = $_POST['udf1'];
			$profile = Profile::findOne($user_id);
			$profile->payment_status = "Cancel";
			$profile->transaction_id = $_POST['txnid'];
			$profile->save();
			Yii::$app->getSession()->setFlash('danger', Yii::t('app', 'Your Payment has been Canceled!'));
			return $this->redirect(['/account/index']);
		}	
	}
}
