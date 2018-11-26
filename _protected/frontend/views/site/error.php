<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = "404 Page";
$this->context->layout = 'simple';
?>
<div class="container">
	<div class="error-page">
		<div class="error-img"><img src="<?= Yii::$app->params['baseurl'] ?>/images/error-img.jpg" alt="error-img" title="error-img"></div>
		<div class="error-text">
			<h4>Oops ! Page not found</h4>
			<a href="https://uckkr.org/">Back to home</a>
		</div>
	</div>
</div>

