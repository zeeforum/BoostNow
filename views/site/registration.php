<?php
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\Html;
?>

<?php $form = ActiveForm::begin(['id' => 'registration-form']); ?>
	<?= $form->field($model, 'username'); ?>
	<?= $form->field($model, 'password')->passwordInput(); ?>
	<?= $form->field($model, 'email')->input('email'); ?>
	<?= $form->field($model, 'country'); ?>
	<?= $form->field($model, 'city'); ?>
	<?= $form->field($model, 'subscriptions')->checkboxList(['a' => 'Item A', 'b' => 'Item B', 'c' => 'Item C']); ?>
	
	<div class = "form-group">
		<?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
		'name' => 'registration-button']) ?>
	</div>
<?php ActiveForm::end(); ?>