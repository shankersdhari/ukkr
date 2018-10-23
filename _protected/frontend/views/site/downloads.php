<?php
$this->title = 'Downloads';
use frontend\widgets\Alert;
use frontend\widgets\Exam;
use frontend\widgets\Speaker;
$i=1;
?>
     <header class="sub-page-head">
        <div class="container-fluid">
            <div class="intro-text">
				<h3><!--?= $model->name ?--></h3>
            </div>
        </div>
    </header>
	<?= Alert::widget() ?>
	<section id="committees">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="section-heading text-left">Downloads</h2>
					<ul class="download">
						<?php foreach($downloads as $download){ 
							?>
						<li><?= $download->name ?>
						<a href="<?=  'http://scesm.org/uploads/downloads/' . $download->file ?>" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a></li>
						<?php	
							} ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
		<section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Paper Submission & Important Dates</h2>
                </div>
            </div>
            <div class="row">
				<?= Exam::widget() ?> 
            </div>
        </div>
    </section>