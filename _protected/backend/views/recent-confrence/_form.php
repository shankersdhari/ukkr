<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;



/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
if($model->featured_image != ''){
    $image = Yii::$app->params['baseurl'] . '/uploads/recent-confrence/thumbs/'. $model->featured_image;
	
}else{
    $image = Yii::$app->params['baseurl'] . '/uploads/no-image.png';
}
?>

<div class="recent-confrence-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'event_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textArea(['rows' => 3]) ?>

    <?php
		// Usage with ActiveForm and model
		echo $form->field($model, 'featured_image')->widget(FileInput::classname(), 
		[
			'options' => ['accept' => 'image/*','multiple' => true],    
			'pluginOptions' => [
				'showCaption' => false,
				'showRemove' => true,
				'showUpload' => false,
				'initialPreview'=>[
					Html::img($image, ['class'=>'file-preview-image', 'alt'=>'', 'width'=>'150', 'title'=>'']),
				],
			]
		]);
	?>

	<?= $form->field($model, 'gallery')->dropDownList($model->galleries,['prompt'=>'Select Gallery','class'=>'form-control select2']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
