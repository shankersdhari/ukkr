<?php
namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\LatestNews;

class News extends Widget
{
    public function run()
    {
        $latest_new =  LatestNews::find()->where(['status' => 1])->limit(20)->orderBy(['id' => SORT_DESC])->all();
        return $this->render('latest-news',
            [
                'model'  => $latest_new,
            ]);

    }
}