<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OurJournals */

$this->title = 'Update Our Journals: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Our Journals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="our-journals-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
