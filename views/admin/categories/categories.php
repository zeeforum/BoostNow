<?php
	use yii\helpers\Url;
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\Html;

	$this->params['breadcrumbs'][] = 'Categories';
?>

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div class="box-body">

					<div class="col-sm-6 col-md-4 leftside">
						<?php $form = ActiveForm::begin(['id' => 'category-form']); ?>
						
							<div class="row">
								
								<div class="form-group">
									<?php echo $form->field($model, 'name'); ?>
								</div>
								<!-- /.form-group -->

								<div class="form-group">
									<?php echo $form->field($model, 'keywords')->textarea(['rows' => 2]); ?>
								</div>
								<!-- /.form-group -->

								<div class="form-group">
									<?php echo $form->field($model, 'description')->textarea(['rows' => 2]); ?>
								</div>
								<!-- /.form-group -->

								<div class="form-group row margin-bottom">
									<div class="col-sm-6">
										<?php
											$parent = array();
											if ($categories_rows) {
												foreach ($categories_rows as $row) {
													$parent[$row->id] = $row->name;
												}
											}
											echo $form->field($model, 'parent_id')->dropdownList($parent, ['prompt'=>'None']);
										?>
									</div>
								</div>
								<!-- /.form-group -->

								<div class="form-group">
									<?php echo $form->field($model, 'detail')->textarea(['rows' => 6]); ?>
								</div>
								<!-- /.form-group -->

								<?= Html::submitButton('Add New Category', ['class' => 'button btn btn-primary btn-large']) ?>
								
							</div>
							<!-- /.row -->

						<?php ActiveForm::end(); ?>
					</div>
					<!-- /left-side -->

					<div class="col-sm-6 col-md-8 rightside">
						<div class="pull-right search-bar">
							<?php $form = ActiveForm::begin(); ?>
								
							<?php ActiveForm::end(); ?>
						</div>
					</div>

				</div>
			</div>
			<!-- /.col (left) -->
		</div>
	</div>
	<!-- /.row --> 