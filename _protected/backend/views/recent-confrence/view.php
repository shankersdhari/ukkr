<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\RecentConfrence */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Recent Confrences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recent-confrence-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'event_date',
            'description',
            'featured_image',
            'gallery',
            'status',
        ],
    ]) ?>

</div>
