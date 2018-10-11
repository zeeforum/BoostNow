<?php
	use yii\widgets\DetailView;
	use yii\helpers\Url;

	$this->title = $model->name . ' - Product';
	$this->params['tab'] = 'products';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Products', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'products'])];
	$this->params['breadcrumbs'][] = $model->name;
?>

<?php $this->beginBlock('links'); ?>
	<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'products']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
<?php $this->endBlock(); ?>

<style type="text/css">
	table.detail-view th {width: 150px;}
</style>

<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'name',
			'title',
			'quantity',
			'description',
			'keywords',
			[
				'attribute' => 'detail',
				'format' => 'raw',
			],
			
			'category.name',
			'admin.username',
			'created_at:datetime',
			'updated_at:datetime',
			[
				'label' => 'Draft',
				'value' => ucfirst($model->draft),
			],
		],
	]);
?>