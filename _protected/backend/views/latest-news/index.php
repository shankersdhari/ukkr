<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LatestNewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Latest News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonial-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">
                    <p class="pull-right">
                        <?= Html::a('Create Latest News', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                            'publish_date:date',
                            'description',
                            'status',
                            [
                              'attribute' => "status",
                                'value' => function($model){
                                    if($model->status == 1){
                                        return "Active";
                                    }else{
                                        return "Inactive";
                                    }
                                }
                            ],
                            'created_at:date',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
