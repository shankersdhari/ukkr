<?php
namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\Noticed;

class Notices extends Widget
{
    public function run()
    {
        $notices =  Noticed::find()->where(['status' => 1])
            ->andWhere(["<=","start_date",time()])
            ->andWhere([">=","end_date",time()])
            ->limit(20)->orderBy(['start_date' => SORT_DESC])->all();
        return $this->render('notices',
            [
                'model'  => $notices,
            ]);

    }
}