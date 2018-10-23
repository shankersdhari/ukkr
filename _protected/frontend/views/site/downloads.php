<?php
$this->title = 'Downloads';
use frontend\widgets\Alert;
use frontend\widgets\Exam;
use frontend\widgets\Speaker;
$i=1;
?>
<div class="inner-header" style="background-image: url('<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/staff-header.jpg')">
	<div class="container">
		<h2>Prospectus</h2>
		<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
	</div>
</div>
<div class="prospectus">
	<div class="container">
		<h3 style="color:#333;">Prospectus 2017 - 2018</h3>
		<h4>IMPORTANT INFORMATION </h4>
		<div class="note">
			<p>Due to Bank Holiday on 24.06.17 the application fee for various courses of University college will be accepted directly in the college permises on 24.06.2017. </p>
		</div>
		<h4 class="text-center">No admission form will be accepted after 24.6.17(5pm) in any case.</h4>
		<ul class="files">
			<?php
			$icon = array("form","prospectus","freslip","guidelines");
			$i = 0;
			foreach($downloads as $download){ ?>
				<li>
					<h3><?= $download->name ?></h3>
					<i class="icon-<?= $icon[$i] ?>"></i><br>
					<a class="btn" href="<?=  Yii::$app->params['baseurl'].'/uploads/downloads/' . $download->file ?>" target="_blank"><i class="icon-right-arrow"></i>Download</a>
				</li>
				<?php
				$i++;
				if($i > 3){
					$i = 0;
				}
			} ?>
		</ul>
		<div class="queries-no">
			<p>For any queries, please call  <b>01744 238049</b></p>
		</div>
	</div>
</div>


