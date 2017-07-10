<?php
	use yii\helpers\Html;
	use yii\helpers\Url;

	$this->params['breadcrumbs'][] = 'Category';
	$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-danger">
				<div class="box-body">
					<div class="pull-right m-bottom-5"> <a class="btn btn-default" href="">Edit Category</a> </div>
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