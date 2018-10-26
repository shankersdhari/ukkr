<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StaffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Member';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">

                    <p class="pull-right">
                        <?= Html::a('Create Staff', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'email:email',
                            'name',
                            'department',
                            [
                                'attribute' => 'departmentName',
                                'label' => 'Sub Department',
                                'value' => function ($model) {
                                    if($model->departmentName){
                                        return $model->departmentName->name;
                                    }else{

                                        return "-";
                                    }
                                }
                            ],
                            'designation',
                            'contact',
                            [
                                'attribute' => 'image',
                                'format' => 'html',
                                'enableSorting' => false,
                                'value' => function ($model) {
                                    return Html::img( Yii::$app->params['baseurl'] . '/uploads/member/thumbs/' . $model->image,
                                        ['width' => '80px']);
                                },
                                'contentOptions' => ['style' => 'width:260px;text-align:center;vertical-align: middle;'],
                            ],
                            [
                                'attribute' => 'status',
                                'value' => function ($model) {
                                    if ($model->status) {
                                        return Html::a(Yii::t('app', 'Active'), null, [
                                            'class' => 'btn btn-success status',
                                            'data-id' => $model->id,
                                            'href' => 'javascript:void(0);',
                                        ]);
                                    } else {
                                        return Html::a(Yii::t('app', 'Inactive'), null, [
                                            'class' => 'btn btn-danger status',
                                            'data-id' => $model->id,
                                            'href' => 'javascript:void(0);',
                                        ]);
                                    }
                                },
                                'contentOptions' => ['style' => 'width:160px;text-align:center'],
                                'format' => 'raw',
                                'filter'=>array("1"=>"Active","0"=>"Inactive"),
                            ],
                            'created_at:date',
                            // 'updated_at',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
