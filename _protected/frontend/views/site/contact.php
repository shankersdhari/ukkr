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
		<p><?= Yii::$app->params['settings']['contact_title'] ?></p>
	</div>
</div>
<div class="contact-us">
	<div class="container">
		<?= Alert::widget() ?>
		<div class="row">
			<div class="col-md-12">
				<h2>Have a university or an idea you'd like to collaborate with Hubs? Please get in touch!</h2>
			</div>
			<div class="col-md-3">
				<div class="info-item">
					<span>EMAIL:</span>
					<p><a href="mailto:<?= Yii::$app->params['settings']['email'] ?>"><?= Yii::$app->params['settings']['email'] ?></a></p>
					<p><a href="mailto:akush@kuk.ac.in">akush@kuk.ac.in</a></p>
				</div>
				<div class="info-item">
					<span>Tel:</span>
					<p><?= Yii::$app->params['settings']['phone_number'] ?></p>
				</div>
			</div>
			<div class="col-md-3">
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
			<div class="col-md-6">
				<div class="contact-form">
					<?php $form = ActiveForm::begin(['id' => 'contact-form','options' => ['class' => 'form-user']]); ?>
						<div class="row">
							<div class="col-md-6">
									<?= $form->field($model, 'name')->textInput(['placeholder' => 'Name','class' => 'form-control'])->label(false) ?>
									<?= $form->field($model, 'subject')->hiddenInput(['value' => 'Contact Us','class' => 'form-control'])->label(false) ?>
							</div>
							<div class="col-md-6">
								<?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone No.','class' => 'form-control'])->label(false) ?>
							</div>
							<div class="col-md-12">
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