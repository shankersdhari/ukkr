<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use frontend\widgets\Login;
use frontend\widgets\Registration;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signin-regi" >
	<div class="container">
		  <?= Login::widget() ?> 
		  <!--?= Registration::widget() ?--> 
	</div>
</div>		
<?php
    if (Yii::$app->getSession()->hasFlash('error')) {
        echo '<div class="alert alert-danger">'.Yii::$app->getSession()->getFlash('error').'</div>';
    }
?>
<?php //echo \nodge\eauth\Widget::widget(['action' => 'site/login']); ?>