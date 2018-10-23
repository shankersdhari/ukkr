<?php

	use yii\helpers\Url;   
	use common\models\Sponser;
   ?>
   
<div class="col-lg-12 col-md-12 col-xm-12 col-sm-12 clients">
		<h3>Our Sponsors</h3>			
			<div class="sponsor">
				<?php foreach($model as $cat ){
					/* if($slide->image=="")
						continue; */
				?>				
					<div class="row" style="margin-top:10px;">	
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">	
							<span><?=$cat->name ?></span>	
						</div>					
						<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
							<?php
								$sponsormodel = Sponser::findAll(['cat_id'=> $cat->id,'status'=>1]);
								foreach($sponsormodel as $slide)								
							?>
							<img src="<?= Yii::$app->params['baseurl']."/uploads/sponser/main/".$slide->image ?>" alt="<?= $slide->title ?>" title="<?= $slide->title ?>"/>					
						</div>		
					</div>
				<?php } ?>		
			</div>
</div> 
 

						