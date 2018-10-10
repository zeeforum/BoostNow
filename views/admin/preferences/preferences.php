<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	$this->title = 'Edit Preferences';	
	$this->params['tab'] = 'settings';
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences']); ?>" class="btn bg-purple btn-flat"> Manage Preferences</a></li>
	<?php $this->endBlock(); ?>

	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	
		<div class="row">

			<?php
				if ($model) {
					foreach ($model as $row) {
						$image = '';
						switch ($row->field_type) {
							case 'textarea':	
								$field = $form->field($formModel, $row->name)->textarea()->label($row->label);
								break;
							case 'image':
								$field = $form->field($formModel, $row->name)->fileInput(['accept' => 'image/*'])->label($row->label);
								$image = $row->value;
								break;
							case 'file':
								$field = $form->field($formModel, $row->name)->fileInput()->label($row->label);
								break;
							default:
								$field = $form->field($formModel, $row->name)->label($row->label);
						}
			?>
				<div class="col-xs-12">
					<?= $field; ?>
				</div>
				<?php
					if ($image != '') {
				?>
				<div class="col-xs-12">
					<img src="<?= Yii::$app->params['imageUrl'] . 'preferences/' . $image; ?>" class="img img-responsive" />
				</div>
				<?php
					}
				?>
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