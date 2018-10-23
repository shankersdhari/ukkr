<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\GallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonial-index">
	<div class="row">
        <div class="col-md-12">
			<div class="box">
                <div class="box-body table-responsive">

				<p class="pull-right">
				   <?= Html::a('Add Gallery Image', ['create', 'gallery_id' => $gallery_id], ['class' => 'btn btn-success']) ?>
				</p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
			'title',
			[
				'attribute' => 'gallery_id',
				'enableSorting' => true,
				'value' => function ($model) {
					return $model->gallery->galley_name;
				},
				'contentOptions' => ['style' => 'width:200px;text-align:left;vertical-align: middle;'],
				'format' => 'raw',

			],
            [
				'attribute' => 'image',
				'format' => 'html',
				'enableSorting' => false,
				'value' => function ($model) {
					return Html::img( Yii::$app->params['baseurl'] . '/uploads/gallery/thumbs/' . $model->image,
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

            ['class' => 'yii\grid\ActionColumn','header'=>'Actions',
				'buttons' => [
				'update' =>function ($url, $model, $key) {
				$options = array_merge([
				'title' => Yii::t('yii', 'Update Image'),
				'aria-label' => Yii::t('yii', 'Update Image'),
				'data-pjax' => '0',
				], []);
				return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['gallery/update','id'=> $model->id , 'gallery_id'=> $model->gallery_id], $options);
				},
				],
				'template' => '{update}{delete}', 'contentOptions' => ['style' => 'width:160px;text-align:center'],
				'contentOptions' => ['style' => 'text-align:center;vertical-align: middle;letter-spacing:10px;'],
			],
        ],
    ]); ?>

				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row --> 
</div>
