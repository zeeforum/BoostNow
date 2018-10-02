<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'Change Password';
	$this->params['tab'] = 'settings';
	$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
	<div class="col-xs-12 col-md-6 col-md-offset-3">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<?= $this->title; ?>
			</div>
			<div class="panel-body">
				<?php
					$form = ActiveForm::begin([
						'fieldConfig' => [
							'template' => "<div class=\"field\">
								<div class=\"row\">
									<div class=\"col-xs-12\">
										{label}{input}{error}
									</div>
								</div>
							</div>",
							'labelOptions' => [],
						],
					]);
				?>

					<?= $form->field($model, 'oldPassword')->passwordInput(); ?>

					<?= $form->field($model, 'password')->passwordInput(); ?>

					<?= $form->field($model, 'confirmPassword')->passwordInput(); ?>			

					<div class="row">
						<div class="col-xs-12 col-sm-4 col-sm-offset-4 text-center">
							<?= Html::submitButton('Change Password', ['class' => 'button btn btn-primary btn-large signin-btn', 'name' => 'cmd']) ?>
						</div>
					</div>

				<?php
					ActiveForm::end();
				?>
			</div>
		</div>
	</div>
</div>