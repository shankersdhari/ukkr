<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body table-responsive">

                    <p class="pull-right">
                        <?= Html::a('Create Course Category', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'name',
                            'slug',
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
                            ['class' => 'yii\grid\ActionColumn','header'=>'Actions',
                                'buttons' => [
                                    'viewcourses' =>function ($url, $model, $key) {
                                        $options = array_merge([
                                            'title' => Yii::t('yii', 'View Courses'),
                                            'aria-label' => Yii::t('yii', 'View Courses'),
                                            'data-pjax' => '0',
                                        ], []);
                                        return Html::a('<span class="glyphicon glyphicon-folder-open"></span>', ['courses/view-courses','cat_id'=>$model->id], $options);
                                    },
                                ],
                                'template' => '{viewcourses} {update}', 'contentOptions' => ['style' => 'width:160px;letter-spacing:10px;text-align:center'],
                            ],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
