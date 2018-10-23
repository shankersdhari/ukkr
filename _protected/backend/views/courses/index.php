<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $cat_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">

                    <p class="pull-right">
                        <?= Html::a('Create Courses', ['create','cat_id' => $cat_id], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => "cat_id",
                                'label' => "Category name",
                                'value' => function($model){
                                    return $model->cat->name;
                                },
                                'contentOptions' => ['style' => 'width:160px;text-align:center'],
                                'format' => 'raw',
                                'filter'=> function($model){
                                    return $model->cats;
                                },
                            ],
                            'name',
                            'qualification',
                            'combination',
                            'contact_person',
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

                            ['class' => 'yii\grid\ActionColumn','header'=>'Actions',
                                'buttons' => [
                                    'update' =>function ($url, $model, $key) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'Update Image'),
                                            'aria-label' => Yii::t('yii', 'Update Image'),
                                            'data-pjax' => '0',
                                        ], []);
                                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['courses/update','id'=> $model->id ], $options);
                                    },
                                ],
                                'template' => '{update}{delete}', 'contentOptions' => ['style' => 'width:160px;text-align:center'],
                                'contentOptions' => ['style' => 'text-align:center;vertical-align: middle;letter-spacing:10px;'],
                            ],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
