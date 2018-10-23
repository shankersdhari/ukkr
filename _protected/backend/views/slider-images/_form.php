<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SliderImages */
/* @var $form yii\widgets\ActiveForm */
$video = Yii::$app->request->get('slider_id');
if($model->mobile_image != ''){
		$image = Yii::$app->params['baseurl'].'/uploads/slides/thumbs/'. $model->mobile_image;
		$title = $model->name;
		if($model->type == 'image'){
			$initialPreview[] = '<img class="file-preview-image" src="'.$image.'" width=200>';

		}
		else{
			$initialPreview[] = '<div class="vid"><video  loop="" autoplay="" width="100%"><source src="'.$image.'" type="video/mp4">Your browser does not support the video tag.</video></div>';

		}
		
}else{
		$title = 'None';
		$image = Yii::$app->params['baseurl'] . '/uploads/gal.png';
		$initialPreview[] = '<img class="file-preview-image" src="'.$image.'" alt="'.$title.'" title="'.$title.'" width=200>';
}
if($model->image_path != ''){
		$image = Yii::$app->params['baseurl'].'/uploads/slides/thumbs/'. $model->image_path;
		$title = $model->name;
		if($model->type == 'image'){
			$initialPreview1[] = '<img class="file-preview-image" src="'.$image.'" width=200>';

		}
		else{
			$initialPreview1[] = '<div class="vid"><video  loop="" autoplay="" width="100%"><source src="'.$image.'" type="video/mp4">Your browser does not support the video tag.</video></div>';

		}
		
}else{
		$title = 'None';
		$image = Yii::$app->params['baseurl'] . '/uploads/gal.png';
		$initialPreview1[] = '<img class="file-preview-image" src="'.$image.'" alt="'.$title.'" title="'.$title.'" width=200>';
}
?>

<div class="Slider-images-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
	<!--?= $form->field($model, 'alt_title')->textInput(['maxlength' => true]) ?-->
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'content')->textArea(['rows' => 3]); ?>
	<?php
		// Usage with ActiveForm and model
		echo $form->field($model, 'image_path')->widget(FileInput::classname(), 
		[
			'options' => ['accept' => 'image/video','multiple' => true],    
			'pluginOptions' => [
				'showCaption' => false,
				'showRemove' => true,
				'showUpload' => false,
				 'initialPreview'=> $initialPreview1,
			]
		]);
	?>
	<?php
		// Usage with ActiveForm and model
		/* echo $form->field($model, 'mobile_image')->widget(FileInput::classname(), 
		[
			'options' => ['accept' => 'image/video','multiple' => true],    
			'pluginOptions' => [
				'showCaption' => false,
				'showRemove' => true,
				'showUpload' => false,
				 'initialPreview'=> $initialPreview,
			]
		]); */
	?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
