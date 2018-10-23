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
            <div class="col-lg-4 col-md-4 col-sm-12">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?= $form->field($model, 'department')->dropDownList(
                    $model->departments,
                    [
                        'class' => 'form-control select2',
                        'id' => 'department',
                        'onchange' => '$.post( "' . Yii::$app->urlManager->createUrl('staff/active-departments?id=') . '"+$(this).val(), function( data ) {
											$( "select#sub_department" ).empty();
											$( "select#sub_department" ).html( data.sub_department );
											$( "select#staff-designation" ).empty();
											$( "select#staff-designation" ).html( data.designation );
										});'

                    ]
                )
                ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?= $form->field($model, 'sub_department')->dropDownList(
                    $departments,
                    [
                        'class' => 'form-control select2',
                        'id' => 'sub_department'
                    ]
                )
                ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?= $form->field($model, 'designation')->dropDownList($model->designations); ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <?= $form->field($model, 'st_designation')->textInput([]); ?>
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
