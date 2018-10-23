<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Staff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'designation')
                    ->dropDownList(
                        $model->designations
                    ); ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>
            </div>
            </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'department')
                    ->dropDownList(
                        $model->departments
                    ); ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= $form->field($model, 'status')
                    ->dropDownList(
                        array(1 => "Active",0 => "Inactive")
                    ); ?>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
