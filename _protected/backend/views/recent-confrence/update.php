<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RecentConfrence */

$this->title = 'Update Recent Confrence: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recent Confrences', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recent-confrence-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
