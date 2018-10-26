<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Noticed */

$this->title = 'Create Noticed';
$this->params['breadcrumbs'][] = ['label' => 'Noticeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
