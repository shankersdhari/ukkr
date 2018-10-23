<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OurJournals */

$this->title = 'Create Our Journals';
$this->params['breadcrumbs'][] = ['label' => 'Our Journals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="our-journals-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
