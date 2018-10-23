<?php
/**
 * Created by PhpStorm.
 * User: Gnetwebs-H
 * Date: 10/23/2018
 * Time: 1:26 AM
 */
?>
<div class="inner-header" style="background-image: url('<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/staff-header.jpg')">
    <div class="container">
        <h2>Our Staff</h2>
        <p>We have around 32 staff members who are responsible for keeping the University</p>
    </div>
</div>
<div class="staff">
    <div class="container">
        <?php if($department) { ?>
            <div class="row">
                <div class="col-md-12">
                    <h3><?= $department ?></h3>
                    <ul>
                    <?php if($department == "Arts") { ?>
                        <li>Various streams are vaailable in Arts wing with honours courses as well.</li>
                        <li>Various combinations are available for arts students.</li>
                        <li>Honours courses are available in English, Sanskrit, Music, Economics and philosophy</li>
                        <li>Students are also encouraged to study computer as a paper.</li>
                    <?php }elseif($department == "Commerce"){ ?>
                        <li>Various streams are Available in Commerce wing.</li>
                        <li>Various combinations are available for Commerce students.</li>
                        <li>B.Com BTM courses are available.</li>
                        <li>Bachelor of Commerce is one of the major attractions among students. Cut Off merit is very high and admissions are based on Merit basis. Students are also encouraged to use computer facility as much as possible .</li>
                    <?php }elseif($department == "Science"){ ?>
                        <li>Various streams are vaailable in Science wing.</li>
                        <li>Various combinations are available for Science students.</li>
                        <li>B.Sc Computer science,BCA, B.Sc Home Science, B.Sc Bio Tech, B.Sc Medical courses are available.</li>
                        <li>Students are also encouraged to use Lab facility as much as possible .</li>
                    <?php }?>
                    </ul>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <?php if($model) {
                foreach ($model as $member) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="image-box">
                                <img src="<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/staff/img.jpg" alt="">
                            </div>
                            <div class="content-box">
                                <h5><?= $member->name ?></h5>
                                <p><?= $member->designation ?></p>
                                <span class="email">Email: <?= $member->email ?></span>
                                <span class="contact">Contact: <?= $member->contact ?></span>
                            </div>
                        </div>
                    </div>
                <?php }
            }?>
        </div>
    </div>
</div>