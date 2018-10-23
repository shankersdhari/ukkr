<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\GalleryMain */

$this->title = 'Update Gallery Main: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gallery Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gallery-main-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
