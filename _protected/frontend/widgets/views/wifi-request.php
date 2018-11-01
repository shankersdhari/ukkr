<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\widgets\Alert; ?>
<div class="contact-us">
    <div class="row">
        <div class="contact-form">
            <?php $form = ActiveForm::begin(['action' => Url::to(['site/request-wifi']),'id' => 'request-wifi-form','options' => ['class' => 'form-user']]); ?>
                <div class="col-md-12">
                    <input type="hidden" name="prev_url" value="<?= Yii::$app->request->url ?>" />
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?= $form->field($model, 'name')->textInput(['placeholder' => 'Name','class' => 'form-control'])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Phone No.','class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <?= $form->field($model, 'rollno')->textInput(['placeholder' => 'Roll No','class' => 'form-control'])->label(false) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'class')->textInput(['placeholder' => 'Class','class' => 'form-control'])->label(false) ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email','class' => 'form-control'])->label(false) ?>
                            <?= $form->field($model, 'msg')->textArea(['placeholder' => 'Message','class' => 'form-control'])->label(false) ?>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group captcha-input">
                                <label for="fname">Security Code<span>*</span></label>
                                <div class="captcha">
                                    <?= $form->field($model, 'captcha')->widget(yii\captcha\Captcha::classname())->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>