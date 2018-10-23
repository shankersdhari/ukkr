<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseCategory */

$this->title = 'Create Course Category';
$this->params['breadcrumbs'][] = ['label' => 'Course Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gallery-index">
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
