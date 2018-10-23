<?php
namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use frontend\models\SignupForm;

class Registration extends Widget
{
	public function run()
	{
        $model = Yii::createObject(SignupForm::className());		
		return $this->render('registration', 
		[
            'model'  => $model,
        ]);
		
	}
}