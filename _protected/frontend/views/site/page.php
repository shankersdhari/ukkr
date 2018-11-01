<?php
$this->title = ($model->meta_title ? $model->meta_title : $model->name);
use frontend\widgets\Alert;
use frontend\widgets\Exam;
use frontend\widgets\Speaker;
?>

<div class="inner-header" style="background-image: url('<?=  Yii::$app->params['baseurl'] ?>/themes/ukkr/images/staff-header.jpg')">
    <div class="container">
        <h2><?= $model->name ?></h2>
        <!--<p><?/*= $model->meta_desc */?></p>-->
    </div>
</div>
<?= Alert::widget() ?>
<?= $model->description ?>
	