<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UpcomingConfrence */

$this->title = 'Update Upcoming Confrence: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Upcoming Confrences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="upcoming-confrence-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
