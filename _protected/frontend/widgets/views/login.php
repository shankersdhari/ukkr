<?phpuse yii\helpers\Html;use yii\widgets\ActiveForm;$js = <<<JS// get the form id and set the event$('form#{$model->formName()}').on('beforeSubmit', function(e) {	var form = $(this);	if (form.find('.has-error').length) {	  return false;	}	// submit form	$.ajax({		url: form.attr('action'),		type: 'post',		data: form.serialize(),		success: function (response) {			if(response.type == 'success'){				$('form#{$model->formName()}').trigger('reset');				$('.form-success').html(response.message);			}else{				$.each( response, function( key, value ) {					$('#'+key).parent().removeClass('has-success').addClass('has-error');					$('#'+key).parent().find('.help-block').html(value);				});			}		}	});	return false;}).on('submit', function(e){    e.preventDefault();});JS;$this->registerJs($js);?>		<div class="row" id="logindiv">			<h3>Login your Account</h3>			<div class="new-cust">				<div class="sign-up">					<p>If you have an account with us, please log in.</p>					<?php $form = ActiveForm::begin([					'id' => $model->formName(),					//'action' => ['site/login'],							//'enableAjaxValidation'   => false,						]); ?>						<div class="email-field">							 <?= $form->field($model, 'username',[							'inputOptions' => [								'placeholder' => 'Username/Email',							]])->label(false) ?> 							<?= $form->field($model, 'password',[							'inputOptions' => [								'placeholder' => 'Password',							]])->passwordInput()->label(false) ?>									 							<div class="forgot-pwd">								<?= Html::submitButton('Login', ['class' => '', 'name' => 'login-button']) ?>   <!--span class="for-pwd red-color">Forgot Your Password?</span-->							</div>										</div>					<?php ActiveForm::end(); ?>				</div>			</div>		</div>	