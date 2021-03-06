<?php
use frontend\widgets\HomeMenuMain;
use frontend\widgets\Search;
use yii\helpers\Url;
$action = Yii::$app->controller->action->id;
if($action == 'page'){
	$action_arry = (explode("/",\Yii::$app->request->url));
	$action = $action_arry[count($action_arry) - 1];
}
?>


	<header>
		<div class="container">
			<div class="header-content">
				<div class="logo">
					<a  href="<?= Yii::$app->homeUrl ?>"><img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/logo.png"></a>
				</div>
				<div class="top-nav">
					<!--<a href="#" class="btn btn-primary">Login</a>-->
					<ul>
						<?php if (Yii::$app->params['settings']['facebook'] != "" && Yii::$app->params['settings']['facebook'] != "#") { ?>
							<li><a target="_blank" href="<?= Yii::$app->params['settings']['facebook'] ?>"><i class="icon-facebook"></i></a></li>
						<?php } ?>
						<?php if (Yii::$app->params['settings']['twitter'] != "" && Yii::$app->params['settings']['twitter'] != "#") { ?>
							<li><a target="_blank" href="<?= Yii::$app->params['settings']['twitter'] ?>"><i class="icon-twitter"></i></a></li>
						<?php } ?>
						<?php if (Yii::$app->params['settings']['linked_in'] != "" && Yii::$app->params['settings']['linked_in'] != "#") { ?>
							<li><a target="_blank" href="<?= Yii::$app->params['settings']['linked_in'] ?>"><i class="icon-linkedin2"></i></a></li>
						<?php } ?>
					</ul>
					<a href="javascript:void(0);" title=""data-toggle="modal" data-target="#request-modal" class="btn btn-primary">WiFi Password Request</a>
					<!--<a class="btn" href="#">NIRF</a>-->
					<a class="btn" href="research-assistant.html">Vacancies</a>
					<a class="btn" href="<?= Url::to(['site/contact']) ?>">Contact Us</a>
				</div>
				<div class="search-box">
					<div class="search">
						<a class="close-btn">+</a>
						<input type="text">
						<button class="btn"><i class="icon-search"></i></button>
					</div>
					<a class="btn search-toggle"><i class="icon-search"></i></a>
					<div class="contact">
						<span class="btn btn-primary"><?= Yii::$app->params['settings']['phone_number'] ?></span>
						<a href="tel:<?= Yii::$app->params['settings']['phone_number'] ?>"><i class="icon-phone btn btn-primary"></i></a>
					</div>
				</div>
				<nav class="navbar navbar-expand-md">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span></span>
						</button>
						<a class="navbar-brand" href="#">Menu</a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li <?php if($action == "index") echo"class='active'"; ?> ><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
							<li <?php if($action == "about-us.html") echo"class='active'"; ?> ><a href="<?= Url::to(['site/page','slug' =>"about-us"]) ?>">About</a></li>
							<li <?php if($action == "staff" && !isset($_GET['department'])) echo"class='active'"; ?>><a href="<?= Url::to(['site/staff']) ?>">Staff</a></li>
							<li <?php if($action == "courses") echo"class='active'"; ?>><a href="<?= Url::to(['site/courses']) ?>">Courses</a></li>
							<li <?php if($action == "downloads") echo"class='active'"; ?>><a href="<?= Url::to(['site/downloads']) ?>">Prospectus</a></li>
							<li <?php if($action == "staff" && isset($_GET['department']) && $_GET['department'] != "Student") echo"class='active'"; ?>>
								<a href="javascript:void(0)">Departments</a>
								<ul class="sub-menu">
									<li>
										<a href="<?= Url::to(['site/staff','department' => 'Arts']) ?>">Arts</a>
									</li>
									<li>
										<a href="<?= Url::to(['site/staff','department' => 'Commerce']) ?>">Commerce</a>
									</li>
									<li>
										<a href="<?= Url::to(['site/staff','department' => 'Science']) ?>">Science</a>
									</li>
								</ul>
							</li>
							<li <?php if($action == "staff" && isset($_GET['department']) && $_GET['department'] == "Student") echo"class='active'"; ?>><a href="<?= Url::to(['site/staff','department' => 'Student']) ?>">Student Corner</a></li>
							<li <?php if($action == "gallery") echo"class='active'"; ?>><a href="<?= Url::to(['site/gallery']) ?>">Gallery</a></li>
							<!--<li <?php /*if($action == "admission-list") echo"class='active'"; */?>><a href="<?/*= Url::to(['site/admission-list']) */?>">Admission Lists</a></li>-->
							<li ><a target="https://www.onlinesbi.com/prelogin/icollecthome.htm?corpID=900385" href="https://www.onlinesbi.com/prelogin/icollecthome.htm?corpID=900385">FEES</a></li>
							<!--li><a href="#">Pride</a></li-->
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			</div>
		</div>
	</header>
