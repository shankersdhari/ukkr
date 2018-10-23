<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RecentConfrence */

$this->title = 'Create Recent Confrence';
$this->params['breadcrumbs'][] = ['label' => 'Recent Confrences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recent-confrence-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
