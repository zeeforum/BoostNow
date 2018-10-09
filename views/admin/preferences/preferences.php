<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	$this->title = 'Edit Preferences';	
	$this->params['tab'] = '';
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences']); ?>" class="btn bg-purple btn-flat"> Manage Preferences</a></li>
	<?php $this->endBlock(); ?>

	<?php $form = ActiveForm::begin(['id' => 'preferences-form']); ?>
	
		<div class="row">

			<?php
				if ($model) {
					foreach ($model as $row) {
						switch ($row->field_type) {
							case 'textarea':	
								$field = '';
								break;
							case 'image':
								$field = '';
								break;
							case 'file':
								$field = '';
								break;
							default:
								$field = $form->field($model, $row->name)->label($row->label);
						}
			?>
						<?= $field; ?>
			<?php
					}
				}
			?>

			<div class="col-xs-12">
				<?= Html::submitButton('Update Preferences', ['class' => 'button btn btn-primary btn-large']) ?>
			</div>
			
		</div>
		<!-- /.row -->

	<?php ActiveForm::end(); ?>