<?php
	use yii\helpers\Url;
	use yii\bootstrap\ActiveForm;
	use yii\bootstrap\Html;

	$this->params['breadcrumbs'][] = 'Categories';
?>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-danger">
				<div class="box-body">
					<div class="pull-right">
						<button type="button" class="btn btn-success btn-sm collapsed" data-toggle="collapse" data-original-title="Add Category" data-target="#addForm"><i class="fa fa-plus icon"></i></button>
					</div>
					<div class="clearfix"></div>

					<div class="collapse" id="addForm">
						<div class="box box-default">
							<?php $form = ActiveForm::begin(['id' => 'category-form']); ?>
							<div class="box-body">
								<div class="row">
									
									<div class="form-group col-xs-6">
										<?php
											$parent = array();
											if ($categories_rows) {
												foreach ($categories_rows as $row) {
													$parent[$row->id] = $row->name;
												}
											}
											echo $form->field($model, 'parent_id')->dropdownList($parent, ['prompt'=>'Select Parent Category']);
										?>
									</div>
									<!-- /.form-group -->
									
								</div>
								<!-- /.row -->
							</div>
							<?php ActiveForm::end(); ?>
							<!-- /.box-body -->
						</div>
					</div>
					<!-- /addForm -->

					<div class="clearfix" style="margin-bottom:5px"></div>
					<div class="panel panel-primary">
						<div class="panel-heading">Categories</div>
						<table class="table table-striped">
						</table>
					</div>
				</div>
			</div>
			<!-- /.col (left) -->
		</div>
	</div>
	<!-- /.row --> 
</section>
<!-- /.content -->