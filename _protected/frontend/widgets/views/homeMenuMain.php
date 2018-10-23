<?php use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\WishlistProductCounter;
use frontend\widgets\CartProductCounter;
?>	
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
	<a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>"><img src="<?= Yii::$app->params['baseurl'] ?>/uploads/settings/main/<?= Yii::$app->params['settings']['logo'] ?>"></a>
</div>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav main-nav">
		<li class="active"><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
		<?php
		foreach($menus as $menu) { ?>
		<li><a href="<?php  if($menu['link'] != "#contact" ){ echo Yii::$app->homeUrl; } ?><?= $menu['link'] ?>"><?= $menu['name'] ?></a></li>
		<?php } ?>
	</ul>
</div><!-- /.navbar-collapse -->