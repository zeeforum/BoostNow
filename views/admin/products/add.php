<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	if (isset($command) && $command == 'edit') {
		$this->title = 'Edit Product';
		$btnText = 'Update';
	} else {
		$this->title = 'Add Product';
		$btnText = 'Add New Product';
	}
	
	$this->params['tab'] = 'products';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Products', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'products'])];
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'products']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
	<?php $this->endBlock(); ?>

	<?php $form = ActiveForm::begin(['id' => 'category-form']); ?>
	
		<div class="row">
			
			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'name'); ?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'title'); ?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-sm-6">
				<?php
					$parent = array('' => 'Select Category');
					if ($categories_rows) {
						foreach ($categories_rows as $row) {
							$parent[$row->id] = $row->name;
						}
					}
					echo $form->field($model, 'category_id')->dropdownList($parent);
				?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'price'); ?>
			</div>
			<!-- /.form-group -->
			<div class="clearfix"></div>

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
				<?php echo $form->field($model, 'detail')->textarea(['rows' => 6]); ?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'quantity'); ?>
			</div>
			<!-- /.form-group -->

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

			<div class="col-xs-12">
				<?= Html::submitButton($btnText, ['class' => 'button btn btn-primary btn-large']) ?>
			</div>
			
		</div>
		<!-- /.row -->

	<?php ActiveForm::end(); ?>