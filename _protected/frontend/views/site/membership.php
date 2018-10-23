<?php
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\widgets\Alert;
$this->title = 'Membership';
?>
<div class="membership">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="main-heading">
                    <h2>Membership</h2>
                </div>
            </div>
        </div>
        <div class="row">
			<?php 
				if($members){
					$class = array('green','blue','orenge','perpal');
					foreach($members as $member){ ?>
					<div class="col-md-3 col-sm-6">
						<div class="item cl-<?= $class[$member->id-1]?>">
							<div class="item-head" style="background: <?= $member->background ?> none repeat scroll 0 0;">
								<img src="<?= Yii::$app->params['baseurl'] ?>/uploads/membership/main/<?= $member->icon ?>">
								<span><?= $member->name ?></span>
								<div class="price">
									<?php if( $member->id != 1 ){ ?> <i class="fa fa-inr" aria-hidden="true"></i><?php } ?><?= $member->cost ?>
								</div>
							</div>
							<div class="item-body">
								<p><?= $member->description ?></p>
								<?php if( $member->id != 1 ){ ?> <a href="<?= Url::to(['site/checkout','id' => $member->id]); ?>">Choose</a><?php } ?>
							</div>
						</div>
					</div>
					<?php
					}
				}
			?>
        </div>
    </div>
</div>