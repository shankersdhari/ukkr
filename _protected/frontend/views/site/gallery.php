<?php
$this->title = 'Gallery';

use yii\helpers\Url;
use frontend\widgets\Gallerywid;
use frontend\widgets\Alert;


$this->registerJsFile(Yii::$app->view->theme->baseUrl . '/js/jquery.magnific-popup.min.js', ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile(Yii::$app->view->theme->baseUrl . '/css/magnific-popup.css', ['depends' => [\frontend\assets\AppAsset::className()]]);


?>

<div class="inner-header" style="background-image: url('<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/about-header.jpg')">
	<div class="container">
		<h2>Gallery</h2>
	</div>
</div>
<div class="gallery">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Latest Photos</h3>
				<p>College numerous function snaps can be seen here. Only selected ones are for display.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="gallery-nav">
					<a href="<?= Url::to(["site/gallery"]); ?>" <?php if($cat_id == 0) { ?> class="active"<?php } ?>>All</a>
					<?php if($model) {
						foreach ($model as $gal) { ?>
							<a <?php if($cat_id == $gal->id ) { ?> class="active"<?php } ?> href="<?= Url::to(["site/gallery",'cat_id' => $gal->id ]); ?>"><?= $gal->galley_name ?></a>
						<?php }
					} ?>
				</div>
			</div>
		</div>
		<div class="row popup-gallery">
			<?php if($images) {
				foreach ($images as $image) { ?>
					<div class="col-md-3">
						<div class="grid-item">
							<a href="<?= Yii::$app->params['baseurl'] ?>/uploads/gallery/main/<?= $image->image ?>" title="<?= $image->title ?>">
								<img src="<?= Yii::$app->params['baseurl'] ?>/uploads/gallery/thumbs/<?= $image->image ?>" alt="<?= $image->title ?>">
							</a>
						</div>
					</div>
				<?php
				}
			} ?>
		</div>
	</div>
</div>