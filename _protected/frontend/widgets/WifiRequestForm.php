<?php
namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\RequestWifi;

class WifiRequestForm extends Widget
{
    public function run()
    {
        $model = new RequestWifi();
        return $this->render('wifi-request',
            [
                'model'  => $model,
            ]);

    }
}