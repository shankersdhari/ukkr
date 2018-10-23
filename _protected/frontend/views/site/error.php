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
			<div class="error-text">
			<h4><span>Error 404</span> Whoops!</h4>
			<p>The page you need cannot be found</p>
			<p>Yoh have requested a page or file which does not exist
			See below for what you can do.</p>
		</div>
			<div class="error-img"><img src="<?= Yii::$app->params['baseurl'] ?>/images/error-img.png" alt="error-img" title="error-img"></div>
	</div>
</div>

