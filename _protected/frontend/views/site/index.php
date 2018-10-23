<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\News;
use frontend\widgets\SliderWid;
$meta_desc = Yii::$app->params['settings']['site_meta_description'];
$meta_title = Yii::$app->params['settings']['site_meta_title'];
$meta_keywords = Yii::$app->params['settings']['site_meta_keyword'];

$this->title = (isset($meta_title) && $meta_title != "") ? $meta_title : 'Scesm';

$this->registerMetaTag([
    'name' => 'description',
    'content' => $meta_desc,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $meta_keywords,
]);


?>

				<?php 
					/*if($gallery){
						foreach($gallery as $image){ */?><!--
						<div class="item">
							<img src="<?/*= Yii::$app->params['baseurl'] */?>/uploads/gallery/main/<?/*= $image->image */?>">
							<h4><?/*= $image->title */?> </h4>
						</div>
						--><?php
/*						}
					}*/
				?>

<?= SliderWid::widget() ?>
<div class="container">
    <div class="notification-slider owl-carousel owl-theme">
        <div class="item">
            <p>Computer department ranked number 1 in haryana, number 4 in India by india today magazine 2017 Computer department ranked number 1 in haryana, number 4 in India by india today magazine 2017 Computer department ranked number 1 in haryana, number 4 in India by india today magazine 2017<small>new</small></p>
        </div>
        <div class="item">
            <p>Computer department ranked number 1 in haryana, number 4 in India by india today magazine 2017<small>new</small></p>
        </div>
        <div class="item">
            <p>Computer department ranked number 1 in haryana, number 4 in India by india today magazine 2017 Computer department ranked number 1 in haryana, number 4 in India by india today magazine 2017<small>new</small></p>
        </div>
        <div class="item">
            <p>Computer department ranked number 1 in haryana, number 4 in India by india today magazine 2017<small>new</small></p>
        </div>
    </div>
</div>
<div class="news-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="img-box">
                    <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/news-img.jpg">
                </div>
            </div>
            <div class="col-md-8 col-sm-7">
                <div class="content-box">
                    <h2>Latest news</h2>
                    <?= News::widget() ?>
                    <a href="#">View All</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="head2">About</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 pull-right">
                <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/about.jpg">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 pull-left">
                <h3>Indian students at kurukshetra university</h3>
                <p><?= nl2br(Yii::$app->params['settings']['header_content']) ?></p>
                <a href="<?= Url::to(['site/page','slug' =>"about-us"]) ?>">Read more</a>
            </div>
        </div>
    </div>
</div>
<div class="gallery-section">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="head2">Gallery</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="image-box">
                    <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery1.jpg">
                    <h3>Nice library</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="image-box">
                    <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery2.jpg">
                    <h3>Nice library</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="image-box">
                    <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery3.jpg">
                    <h3>Nice library</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-12">
                <div class="image-box">
                    <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery4.jpg">
                    <h3>Nice library</h3>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="image-box">
                    <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery5.jpg">
                    <h3>Nice library</h3>
                </div>
            </div>
        </div>
    </div>
</div>
    