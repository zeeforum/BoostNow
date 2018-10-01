<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'Profile';
?>
<div class="panel panel-primary">
	<div class="panel panel-body">
		<?php
			$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
		?>

			<?= $form->field($model, 'description')->textarea(); ?>

			<?= $form->field($model, 'picture')->fileInput(['accept' => 'image/*']); ?>

			<?= Html::submitButton('Update', ['class' => 'button btn btn-primary btn-large signin-btn', 'name' => 'cmd']) ?>

		<?php
			ActiveForm::end();
		?>
	</div>
</div>