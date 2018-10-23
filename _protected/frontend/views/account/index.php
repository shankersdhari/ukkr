
<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
$this->title = 'Account Dashboard';
?>		
		<!-- account dashboard -->
<div class="container">
	<div class="container-fluid craftsmanship-area">
		<div class="user-dashboard">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					 <div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="dashboard-list">
							<h4>Account</h4>
								<ul class="acc-dash">
									<li><a href="<?= Url::to(['account/index']) ?>" class="active">Account Dashboard</a></li>
									<li><a href="<?= Url::to(['account/information']) ?>" >Edit Profile</a></li>
									<li><?= Html::a('Logout', ['site/logout'], ['data' => ['method' => 'post']]) ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- end of left part of account list-->
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<div class="account-detail">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="hello-user">
									<h4>Hello, <?= $profile->fname?> <?= $profile->lname?> !</h4>
									<p>From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</p>
									</div>
							</div>
						</div>
						<div class="account-info">
							<div class="row">
								<div class="col-lg-12">
									<h3>Account Information</h3>
									<div class="info-edit">
										<h5>Contact Information <span><a href="<?= Url::to(['account/information']) ?>">Edit</a></span> </h5>
										<p><b>Name : </b><?= $profile->fname?> <?= $profile->lname?></p>
										<p><b>Email : </b><?= $user->email ?></p>
										<p><b>Phone No. : </b><?= $profile->phone ?></p>
										<p><b>Membership : </b><?= strip_tags($profile->membershipName->name); ?></p>
										<p><b>Membership Status : </b><?php if($profile->payment_status == 'Success'){ echo"Enabled"; }else{ echo"Disabled"; } ?></p>
										<p><b>Payment Status : </b><?= $profile->payment_status ?></p>
										<p><b>Purchase Date : </b><?= date("d F Y", $profile->updated_at); ?></p>
										<p><b>Transaction Id : </b><?= $profile->transaction_id; ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end of right part of account detail-->
			</div>
		</div>
	</div>
 </div>
