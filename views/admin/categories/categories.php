<?php
	use yii\helpers\Url;
	use yii\bootstrap\Html;
	use yii\grid\GridView;
	use app\models\admin\Categories;

	$this->title = 'Categories';
	$this->params['tab'] = 'categories';
	$this->params['breadcrumbs'][] = $this->title;
?>

	<div class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div class="box-body">

					<div class="">
						<?php
							use yii\widgets\Pjax;
							Pjax::begin([
							    // PJax options
							]);
							echo GridView::widget([
								'dataProvider' => $dataProvider,
								'columns' => [
									['class' => 'yii\grid\SerialColumn'],
									// Simple columns defined by the data contained in $dataProvider.
									// Data from the model's column will be used.
									'name',
									// More complex one.
									[
										'class' => 'yii\grid\ActionColumn', // can be omitted, as it is the default
									],
								],
							]);
							Pjax::end([
							    // PJax options
							]);
						?>
					</div>
					
				</div>
			</div>
			<!-- /.col (left) -->
		</div>
	</div>
	<!-- /.row --> 