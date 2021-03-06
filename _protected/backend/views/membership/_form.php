<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\file\FileInput;



/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
if($model->icon != ''){
    $image = Yii::$app->params['baseurl'] . '/uploads/membership/thumbs/'. $model->icon;
	
}else{
    $image = Yii::$app->params['baseurl'] . '/uploads/no-image.png';
}
?>

<div class="membership-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'cost')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'background')->textInput(['maxlength' => true]) ?>
	<?php
		// Usage with ActiveForm and model
		echo $form->field($model, 'icon')->widget(FileInput::classname(), 
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
    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
