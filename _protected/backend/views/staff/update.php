<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Staff */

$this->title = 'Update Member: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <?= $this->render('_form', [
                    'model' => $model,
                    'departments' => $departments,
                ]) ?>

            </div>
        </div>
    </div>
</div>
