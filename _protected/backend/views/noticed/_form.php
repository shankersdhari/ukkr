<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Noticed */
/* @var $form yii\widgets\ActiveForm */
if($model->start_date != ""){
    $model->start_date = date("d-m-Y",$model->start_date);
}
if($model->end_date != ""){
    $model->end_date = date("d-m-Y",$model->end_date);
}
?>

<div class="noticed-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <?= $form->field($model, 'content')->textArea(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'start_date')->widget(\yii\jui\DatePicker::class, [
                    //'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                    'options' => ["class" => "form-control"]
                ]) ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'end_date')->widget(\yii\jui\DatePicker::class, [
                    //'language' => 'ru',
                    'dateFormat' => 'dd-MM-yyyy',
                    'options' => ["class" => "form-control"]
                ]) ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
