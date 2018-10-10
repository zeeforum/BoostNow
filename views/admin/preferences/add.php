<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	if (isset($command) && $command == 'edit') {
		$this->title = 'Edit Preferences';
		$btnText = 'Update';
	} else {
		$this->title = 'Add Preferences';
		$btnText = 'Add New Preferences';
	}
	
	$this->params['tab'] = 'settings';
	$this->params['breadcrumbs'][] = ['label' => 'Preferences', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences/'])];
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences/']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
	<?php $this->endBlock(); ?>

	<?php $form = ActiveForm::begin(['id' => 'preferences-form']); ?>
	
		<div class="row">
			
			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'name'); ?>
			</div>
			<!-- /.form-group -->

            <div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'label'); ?>
			</div>
			<!-- /.form-group -->
            <div class="clearfix"></div>

			<div class="form-group col-sm-6">
				<?php
					$parent = array(
                        'text' => 'Text',
                        'textarea' => 'TextArea',
                        'image' => 'Image',
                        'file' => 'File',
                    );
					
					echo $form->field($model, 'field_type')->dropdownList($parent);
				?>
			</div>
			<!-- /.form-group -->

			<div class="col-xs-12">
				<?= Html::submitButton($btnText, ['class' => 'button btn btn-primary btn-large']) ?>
			</div>
			
		</div>
		<!-- /.row -->

	<?php ActiveForm::end(); ?>