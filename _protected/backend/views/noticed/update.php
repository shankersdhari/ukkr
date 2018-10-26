<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Noticed */

$this->title = 'Update Noticed: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Noticeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
