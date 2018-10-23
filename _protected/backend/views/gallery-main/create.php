<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\GalleryMain */

$this->title = 'Create Gallery Main';
$this->params['breadcrumbs'][] = ['label' => 'Gallery Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-main-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
