<?php
$this->title = 'Gallery';

use yii\helpers\Url;
use frontend\widgets\Gallerywid;
use frontend\widgets\Alert;
?>
<!-- About Section -->
<!--<section id="gallery">
	<div class="container">
	<div class="row">
		<div class="col-lg-12 text-center">
			<?/*= Alert::widget() */?>
			<?/*= Gallerywid::widget(['show'=>0]) */?>
		</div>
	</div>
	</div>
</section>-->

<div class="inner-header" style="background-image: url('<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/about-header.jpg')">
	<div class="container">
		<h2>Gallery</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
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
					<a href="#" class="active">All</a>
					<?php if($model) {
						foreach ($model as $gal) { ?>
							<a href="<?= Url::to(["site/gallery",'id' => $gal->id ]); ?>"><?= $gal->galley_name ?></a>
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
							<a href="<?= Yii::$app->params['baseurl'] ?> /uploads/gallery/main/<?= $model->image ?>" title="<?= $model->title ?>">
								<img src="<?= Yii::$app->params['baseurl'] ?> /uploads/gallery/thumbs/<?= $model->image ?>" alt="<?= $model->title ?>">
							</a>
						</div>
					</div>
				<?php
				}
			} ?>
		</div>
	</div>
</div>