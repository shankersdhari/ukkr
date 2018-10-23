<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\widgets\Alert;
$this->title = "Contact Us";
?>
<div class="contact-box">
	<div class="container">
		<div class="row">
			<?= Alert::widget() ?>
			<div class="col-md-6">
				<div class="form-box">
					<?php $form = ActiveForm::begin(['id' => 'contact-form','options' => ['class' => 'form-user']]); ?>
						<div class="form-group">
							<?= $form->field($model, 'name')->textInput(['placeholder' => 'Name','class' => 'form-control'])->label(false) ?>
						</div>
						<div class="form-group">
							<?= $form->field($model, 'email')->textInput(['placeholder' => 'Email','class' => 'form-control'])->label(false) ?>
						</div>
						<div class="form-group">
							<?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone No.','class' => 'form-control'])->label(false) ?>
						</div>
						<div class="form-group">
							<?= $form->field($model, 'subject')->textInput(['placeholder' => 'Subject','class' => 'form-control'])->label(false) ?>
						</div>
						<div class="form-group">
							<?= $form->field($model, 'body')->textArea(['placeholder' => 'Message','class' => 'form-control'])->label(false) ?>
						</div>
						<?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-default', 'name' => 'contact-button']) ?>
					<?php ActiveForm::end(); ?>
				</div>
			</div>	
			<div class="col-md-6">
				<div class="address-box">
					<ul>
						<li>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<p><?= Yii::$app->params['settings']['contact_detail'] ?></p>
						</li>
						<li>
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<p><?= Yii::$app->params['settings']['email'] ?></p>
							<p>dummy2@dummy.com</p>
						</li>
						<li>
							<i class="fa fa-phone" aria-hidden="true"></i>
							<p><?= Yii::$app->params['settings']['phone_number'] ?></p>
							<p>+ 3215 546 8975</p>
						</li>
					</ul>
				</div>
			</div>	
			<!--div class="col-md-12">
				<div class="map-box">
			
				</div>
			</div-->	
		</div>		
	</div>		
</div>
<div class="map-section">
	<?= Yii::$app->params['settings']['contact_map_code'] ?>
</div>