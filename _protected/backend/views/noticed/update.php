<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Noticed */

$this->title = 'Update Noticed: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Noticeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="noticed-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
