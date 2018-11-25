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
			<h4>Class is over ! Page is not found</h4>
			<a href="<?= Yii::$app->params['baseurl'] ?>">Back to home</a>
		</div>
	</div>
</div>

