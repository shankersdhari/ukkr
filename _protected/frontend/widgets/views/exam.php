
<div class="paper-sub-box">
	<?php 
	$img = array('icon2.png','icon3.png','icon4.png','icon1.png');
	if($model){
		$i =0;
		foreach($model as $exam){ ?>
			<div class="col-md-3 col-sm-6">
				<div class="paper-sub-item">
					<img src="<?= Yii::$app->params['baseurl'] ?>/img/<?= $img[$i] ?>">
					<h3><?= $exam->name ?></h3>
					<span><?= $exam->type ?></span>
					<span class="color"><?= $exam->exam_date ?></span>
				</div>
			</div>
	<?php $i++;
		} 
	}?>
</div>