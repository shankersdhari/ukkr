<?php
use frontend\widgets\FooterMenu;
use yii\helpers\Url;
use frontend\widgets\Contact;
use frontend\widgets\WifiRequestForm;

?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6  col-xs-12">
                <h3>Administration</h3>
                <ul>
                    <li><a href="staff.html">Principal - Sh. Suraj Bhan Malik</a></li>
                    <li><a href="staff.html">Time Table Incharge - Dr. Hitender Tyagi</a></li>
                    <li><a href="staff.html">Sports incharge - Dr Santosh Dahiya</a></li>
                    <li><a href="staff.html">Website Manager - Dr Ashwani kush</a></li>
                    <li><a href="staff.html">Press Release information - Dr Maha Singh</a></li>
                    <li><a href="staff.html">Placement - Dr H. Tyagi</a></li>
                    <li><a href="staff.html">YRC Counsellor - Dr Nirupma Bhatti</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6  col-xs-12">
                <h3>Library and others</h3>
                <ul>
                    <li><a href="staff.html">Library incharge - Sh. Chetan Sharma</a></li>
                    <li><a href="staff.html">Alumni - Dr Vivek Chawla</a></li>
                    <li><a href="staff.html">International Students - Dr R Sudan</a></li>
                    <li><a href="staff.html">Student Hostel issues - Dr Suresh Darolia</a></li>
                    <li><a href="staff.html">Student Development NCC - Lt Dr Sukarmwati, Dr Virender Pal</a></li>
                    <li><a href="staff.html">UGC Services - Dr Sanjeev Gupta</a></li>
                    <li><a href="staff.html">Student Life NSS - Dr N.bhatti, Dr Santosh Dubey, Dr vineet and Ms
                            Manju</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-sm-6  col-xs-12">
                <h3>Library and others</h3>
                <ul>
                    <li><a href="staff.html">Body Hostel - Dr Suresh</a></li>
                    <li><a href="staff.html">Girls Hostel - Dr Kusum, Dr Nirupma, Ms Manju</a></li>
                    <li><a href="staff.html">Asstt. Registrar - Mr Karam Singh</a></li>
                    <li><a href="staff.html">Salary Section - Mr Sant Kumar</a></li>
                    <li><a href="staff.html">Free Section - Mr Mangesh Sharma</a></li>
                    <li><a href="staff.html">Security - Dr Anil Gupta</a></li>
                    <li><a href="staff.html">Account Section - Mr. Sumit Kumar</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <p class="copy">Copyright &copy; 2014 - All Rights Reserved - <a href="#">uckkr.org</a> | Designed by <a
                        href="https://gnetwebs.com">GnetWebs</a></p>
            </div>
            <div class="col-sm-4">
                <ul class="social">
                    <?php if (Yii::$app->params['settings']['facebook'] != "" && Yii::$app->params['settings']['facebook'] != "#") { ?>
                        <li><a href="<?= Yii::$app->params['settings']['facebook'] ?>"><i class="icon-facebook"></i></a></li>
                    <?php } ?>
                    <?php if (Yii::$app->params['settings']['twitter'] != "" && Yii::$app->params['settings']['twitter'] != "#") { ?>
                        <li><a href="<?= Yii::$app->params['settings']['twitter'] ?>"><i class="icon-twitter"></i></a></li>
                    <?php } ?>
                    <?php if (Yii::$app->params['settings']['linked_in'] != "" && Yii::$app->params['settings']['linked_in'] != "#") { ?>
                        <li><a href="<?= Yii::$app->params['settings']['linked_in'] ?>"><i class="icon-linkedin2"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade showModalButton" id="request-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">WiFi Password Request </h4>
            </div>
            <div class="modal-body" id="rating-content">
                <?= WifiRequestForm::widget() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>