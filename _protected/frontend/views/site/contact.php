<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\widgets\Alert;
$this->title = "Contact Us";
?>


<div class="inner-header" style="background-image: url('images/staff-header.jpg')">
	<div class="container">
		<h2>Contact us</h2>
	</div>
</div>
<div class="contact-us">
	<div class="container">
		<?= Alert::widget() ?>
		<div class="row">
			<div class="col-md-12">
				<h2><?= Yii::$app->params['settings']['contact_title'] ?></h2>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="info-item">
					<span>EMAIL:</span>
					<p><?= Yii::$app->params['settings']['email'] ?></p>
				</div>
				<div class="info-item">
					<span>Tel:</span>
					<p><?= Yii::$app->params['settings']['phone_number'] ?></p>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6">
				<div class="info-item">
					<span>Fax:</span>
					<p><?= Yii::$app->params['settings']['phone_number'] ?></p>
				</div>
				<div class="info-item">
					<span>office:</span>
					<h4>PRINCIPAL Sh. Suraj Bhan Malik</h4>
					<?= Yii::$app->params['settings']['contact_detail'] ?>
					<div class="social">
						<a href="#"><i class="icon-facebook"></i></a>
						<a href="#"><i class="icon-twitter"></i></a>
						<a href="#"><i class="icon-linkedin"></i></a>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-4 col-xs-12">
				<div class="contact-form">
					<?php $form = ActiveForm::begin(['id' => 'contact-form','options' => ['class' => 'form-user']]); ?>
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
								<?= $form->field($model, 'name')->textInput(['placeholder' => 'Name','class' => 'form-control'])->label(false) ?>
								<?= $form->field($model, 'subject')->hiddenInput(['value' => 'Contact Us','class' => 'form-control'])->label(false) ?>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-6 col-xs-12">
								<?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone No.','class' => 'form-control'])->label(false) ?>
							</div>
							<div class="col-xs-12">
								<?= $form->field($model, 'email')->textInput(['placeholder' => 'Email','class' => 'form-control'])->label(false) ?>
								<?= $form->field($model, 'body')->textArea(['placeholder' => 'Message','class' => 'form-control'])->label(false) ?>
							</div>
						</div>
						<button type="submit" class="btn btn-default">Send</button>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="map">
		<?= Yii::$app->params['settings']['contact_map_code'] ?>
	</div>
</div>