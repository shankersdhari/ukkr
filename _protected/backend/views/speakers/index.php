<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SpeakersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Speakers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">
	<div class="row">
        <div class="col-md-12">
			<div class="box">
                <div class="box-body table-responsive">

					<p class="pull-right">
        <?= Html::a('Create Speakers', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'S.No.'],

            'name',
            'designation',
			[
				'attribute' => 'avatar',
				'format' => 'html',
				'value' => function ($model) {
					return Html::img( Yii::$app->params['baseurl'] . '/uploads/speakers/thumbs/' . $model->avatar,
						['width' => '80px']);
				},
				'contentOptions' => ['style' => 'width:200px;height:100px;text-align:left;vertical-align: middle;'],
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
			[	
				'class' => 'yii\grid\ActionColumn','header'=>'Actions',
				'buttons' => [
					 'delete' => function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
							'title' => Yii::t('app', 'Delete speaker'),
							'data-confirm'=>'Are you sure you want to delete '.$model->name.' speaker?',
							'data-method'=>'POST',
							'data-pjax' => '0',											
						]);
					}
				],
				'template' => '{update} {delete}', 'contentOptions' => ['style' => 'width:160px;letter-spacing:10px;text-align:center'],
			],
        ],
    ]); ?>
</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row --> 
</div>
