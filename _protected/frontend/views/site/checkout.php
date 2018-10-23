<?php
   use yii\helpers\Html;
   use yii\widgets\ActiveForm;
   use kartik\file\FileInput;
   ?>

<div class="container">
   <div class="appication-form">
      <div class="table-responsive">
	   <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data' ]]); ?>
        <table class="table" border="0">
            <tr class="table-tr">
               <td colspan="5">
                  <h1>Purchasing Membership <?= $members->name ?></h1>
               </td>
            </tr>
            <tr class="table-tr">
				<td style="width:20%;">Name<span class="color">*</span></td>
				<td style="width:30%;"><?= $form->field($profile, 'fname')->textInput()->label(false) ?></td>
				<td style="width:20%;">Last Name</td>
				<td style="width:30%;"><?= $form->field($profile, 'lname')->textInput()->label(false) ?></td>
            </tr>
            <tr class="table-tr">
				<td style="width:20%;">Email Id<span class="color">*</span></td>
				<td style="width:30%;"><?= $form->field($model, 'email')->textInput()->label(false) ?></td>
				<td style="width:20%;">Phone No.<span class="color">*</span></td>
				<td style="width:30%;"><?= $form->field($profile, 'phone')->textInput()->label(false) ?></td>
            </tr>
            <tr class="table-tr">
               <td width="35%" height="47" colspan="2"></td>
               <td colspan="3"><input type="submit" value="Submit" name="" class="table-submit">&nbsp;&nbsp;<input type="reset" value="reset" name=""></td>
            </tr>
        </table>
		 <?php ActiveForm::end(); ?> 
      </div>
   </div>
</div>