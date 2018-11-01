<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RequestWifi */

$this->title = 'Create Request Wifi';
$this->params['breadcrumbs'][] = ['label' => 'Request Wifis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-wifi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
