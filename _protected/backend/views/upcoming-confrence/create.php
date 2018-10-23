<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UpcomingConfrence */

$this->title = 'Create Upcoming Confrence';
$this->params['breadcrumbs'][] = ['label' => 'Upcoming Confrences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="upcoming-confrence-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
