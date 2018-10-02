<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$this->title = 'Update Profile';
	$this->params['breadcrumbs'][] = 'Your Profile';
?>
<div class="box box-danger">
	<div class="box-body">
		<?php
			$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
		?>

			<?= $form->field($model, 'description')->textarea(); ?>

			<?= $form->field($model, 'picture')->fileInput(['accept' => 'image/*']); ?>

			<?php
				if (Yii::$app->params['profilePicture']) {
			?>
			<div class="col-xs-12 col-sm-8 no-gutter">
				<img src="<?= Yii::$app->params['profilePicture']; ?>" class="img img-responsive" />
			</div>
			<div class="clearfix" style="margin-bottom:10px;"></div>
			<?php
				}
			?>

			<?= Html::submitButton('Update', ['class' => 'button btn btn-primary btn-large signin-btn', 'name' => 'cmd']) ?>

		<?php
			ActiveForm::end();
		?>
	</div>
</div>