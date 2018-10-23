<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\LatestNews */

$this->title = 'Create Latest News';
$this->params['breadcrumbs'][] = ['label' => 'Latest News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="testimonial-index">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body ">

                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>
