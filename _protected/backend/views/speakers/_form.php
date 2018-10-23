<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Speakers */
/* @var $form yii\widgets\ActiveForm */

if($model->avatar != ''){
		$image = Yii::$app->params['baseurl'].'/uploads/speakers/thumbs/'. $model->avatar;
		$initialPreview[] = '<img class="file-preview-image" src="'.$image.'" width=200>';	
}else{
		$title = 'None';
		$image = Yii::$app->params['baseurl'] . '/uploads/gal.png';
		$initialPreview[] = '<img class="file-preview-image" src="'.$image.'" width=200>';
}
?>

<div class="speakers-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designation')->textInput(['maxlength' => true]) ?>

    <?php
		// Usage with ActiveForm and model
		echo $form->field($model, 'avatar')->widget(FileInput::classname(), 
		[
			'options' => ['accept' => 'image/*','multiple' => true],    
			'pluginOptions' => [
				'showCaption' => false,
				'showRemove' => true,
				'showUpload' => false,
				 'initialPreview'=> $initialPreview,
			]
		]);
	?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
