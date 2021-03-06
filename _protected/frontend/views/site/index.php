<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\News;
use frontend\widgets\Notices;
use frontend\widgets\SliderWid;
$meta_desc = Yii::$app->params['settings']['site_meta_description'];
$meta_title = Yii::$app->params['settings']['site_meta_title'];
$meta_keywords = Yii::$app->params['settings']['site_meta_keyword'];

$this->title = (isset($meta_title) && $meta_title != "") ? $meta_title : '
';

$this->registerMetaTag([
    'name' => 'description',
    'content' => $meta_desc,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $meta_keywords,
]);


?>

<?= SliderWid::widget() ?>
<?= Notices::widget() ?>
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
                <h3>Indian students at University college</h3>
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
                <a href="https://uckkr.org/gallery.html">
                    <div class="image-box">
                        <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery1.jpg">
                        <h3>View gallery</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-12">
                <a href="https://uckkr.org/gallery.html">
                    <div class="image-box">
                        <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery2.jpg">
                        <h3>View gallery</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-9 col-sm-12">
                <a href="https://uckkr.org/gallery.html">
                    <div class="image-box">
                        <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery3.jpg">
                        <h3>View gallery</h3>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a href="https://uckkr.org/gallery.html">
                    <div class="image-box">
                        <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/gallery4.jpg">
                        <h3>View gallery</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
    