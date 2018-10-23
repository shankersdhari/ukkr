<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Staff */

$this->title = 'Create Staff';
$this->params['breadcrumbs'][] = ['label' => 'Staff', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>
