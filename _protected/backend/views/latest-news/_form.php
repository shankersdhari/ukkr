<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LatestNews */
/* @var $form yii\widgets\ActiveForm */
if($model->publish_date != ""){
    $model->publish_date = date("d-m-Y",$model->publish_date);
}
?>

<div class="latest-news-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-8 col-md-6 col-sm-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-12">
            <?= $form->field($model, 'publish_date')->widget(\yii\jui\DatePicker::class, [
                //'language' => 'ru',
                'dateFormat' => 'dd-MM-yyyy',
                'options' => ["class" => "form-control"]
            ]) ?>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-12">
            <?= $form->field($model, 'status')
                ->dropDownList(
                    array(1 => "Active",0 => "Inactive")
                ); ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?= $form->field($model, 'description')->textArea(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
