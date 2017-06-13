<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\assets\AuthAsset;

AuthAsset::register($this);
?>

<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3>Admin Login</h3>
		</div>
		
		<?php $form = ActiveForm::begin([
			'id' => 'form1',
			'method' => 'post',
			'fieldConfig' => [
				'template' => "<div class=\"field\"><div class=\"row\"><div class=\"col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center\">{label}{input}{error}</div></div></div>",
				'labelOptions' => [],
			],
		]); ?>

		<div class="panel-body">
			<div class="login-fields">
				<p>Please provide your details</p>
						
				<?= $form->field($model, 'username')->textInput(['autofocus' => true, 'id' => 'username', 'placeholder' => 'Email/Username', 'class' => 'form-control']) ?>

				<?= $form->field($model, 'password')->passwordInput(['id' => 'password', 'placeholder' => 'Password', 'class' => 'form-control']) ?>
			</div> <!-- /login-fields -->

			<div class="login-actions">
				<div class="login-checkbox">
					<?= $form->field($model, 'rememberMe')->checkbox([
						'template' => "<div class=\"field login-checkbox\">{input} {label}</div>",
					]) ?>
				</div>
				<?= Html::submitButton('Login', ['class' => 'button btn btn-success btn-large signin-btn', 'name' => 'cmd']) ?>
			</div> <!-- .actions -->
		</div>

		<?php ActiveForm::end(); ?>
</div> <!-- /content -->
<div class="clear"></div>

<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3 text-center">
	<a href="http://hitscandals.com/blackzee/forgot-password">Forgot Password Click Here To Recover?</a>
</div> <!-- /login-extra -->