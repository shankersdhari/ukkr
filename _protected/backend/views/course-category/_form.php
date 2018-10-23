<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-category-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <br>
            <br>
            <br>
         </div>
         </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
