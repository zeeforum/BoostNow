<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	if (isset($command) && $command == 'edit') {
		$this->title = 'Edit Page';
		$btnText = 'Update';
	} else {
		$this->title = 'Add Page';
		$btnText = 'Add New Page';
	}
	
	$this->params['tab'] = 'page';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Pages', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'page'])];
	$this->params['breadcrumbs'][] = $this->title;

	$this->registerCss('
	.multiple-pictures img {margin: 5px 5px;}
	.red-note {color:red;}
	');
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'page']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
	<?php $this->endBlock(); ?>

	<?php $form = ActiveForm::begin(['id' => 'pages-form']); ?>
	
		<div class="row">
			
			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'title'); ?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'page_title'); ?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'description')->textarea(['rows' => 2]); ?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'keywords')->textarea(['rows' => 2]); ?>
			</div>
			<!-- /.form-group -->
			<div class="clearfix"></div>
			

			<div class="form-group col-xs-12">
				<?php echo $form->field($model, 'content')->textarea(['rows' => 6]); ?>
			</div>
			<!-- /.form-group -->
			<div class="clearfix"></div>

			<div class="form-group col-xs-12 col-sm-6">
				<?php
					$parent = array('top-header' => 'Top Header', 'header' => 'Header', 'footer' => 'Footer', 'both' => 'Both (Header & Footer)', 'all' => 'All');
					echo $form->field($model, 'section')->dropdownList($parent);
				?>
			</div>

			<div class="form-group col-xs-12 col-sm-6">
				<?php 
					$items = [
						'no' => 'No', 
						'yes' => 'Yes'
					]
				?>
				<?php echo $form->field($model, 'draft')->radioList($items, [
					'item' => function($index, $label, $name, $checked, $value) {
						$checkedString = '';
						if ($checked) {
							$checkedString = 'checked';
						}
						$return = '<label class="radio-inline">';
						$return .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $checkedString . '>';
						$return .= '<span>' . $label . '</span>';
						$return .= '</label>';
						return $return;
					}
				]); ?>
			</div>
			<!-- /.form-group -->
			<div class="clearfix"></div>

			<div class="col-xs-12 col-sm-6">
				<?= Html::submitButton($btnText, ['class' => 'button btn btn-primary btn-large']) ?>
			</div>
			<div class="clearfix"></div>
			
		</div>
		<!-- /.row -->

	<?php ActiveForm::end(); ?>