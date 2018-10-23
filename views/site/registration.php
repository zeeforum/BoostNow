<?php
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\Html;

	$this->title = 'Register';
	$this->params['breadcrumbs'][] = $this->title;
?>

<div class="register-page">
	<div class="page-title text-center">
        <h1><?= Html::encode($this->title) ?></h1>
	</div>
	
	<div class="col-xs-12 col-sm-offset-2 col-sm-8">
		<p class="col-xs-12">Please fill out the following fields to register your account.</p>

		<?php $form = ActiveForm::begin(['id' => 'registration-form']); ?>
			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'firstName'); ?>
			</div>

			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'lastName'); ?>
			</div>
			<div class="clearfix"></div>

			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'username'); ?>
			</div>

			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'email')->input('email'); ?>
			</div>
			<div class="clearfix"></div>
			
			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'password')->passwordInput(); ?>
			</div>
			
			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'confirmPassword')->passwordInput(); ?>
			</div>
			<div class="clearfix"></div>

			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'country'); ?>
			</div>

			<div class="col-xs-12 col-sm-6">
				<?= $form->field($model, 'city'); ?>
			</div>
			<div class="clearfix"></div>
				
			<div class="col-xs-12">
				<?= $form->field($model, 'rememberMe')->checkbox([
                	'template' => "<div class=\"field\">{input} {label}</div>\n<div class=\"error\">{error}</div>",
            	]) ?>
					
				<div class = "form-group">
					<?= Html::submitButton('Register', ['class' => 'btn btn-primary btn-boostnow',
					'name' => 'registration-button']) ?>
				</div>
			</div>
		<?php ActiveForm::end(); ?>
	</div>
</div>