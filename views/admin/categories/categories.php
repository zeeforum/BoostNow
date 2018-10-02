<?php
	use yii\helpers\Url;
	use yii\bootstrap\Html;
	use yii\grid\GridView;
	use app\models\admin\Categories;

	$this->title = 'Categories';
	$this->params['tab'] = 'categories';
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'categories/add']); ?>" class="btn bg-purple btn-flat"> Add Category</a></li>
	<?php $this->endBlock(); ?>

	<div class="">
		<?php
			use yii\widgets\Pjax;
			Pjax::begin([
			    // PJax options
			]);
			
			echo GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					// Simple columns defined by the data contained in $dataProvider.
					// Data from the model's column will be used.
					'name',
					[
						'attribute' => 'draft',
					],
					[
						'attribute' => 'created_at',
						'format' => ['date', 'php:Y-m-d']
					],
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