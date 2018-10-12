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
			'price',
			'quantity',
			'description',
			'keywords',
			[
				'attribute' => 'detail',
				'format' => 'raw',
			],
			
			'category.name',
			'admin.username',
			[
                'attribute' => 'created_at',
                'value' => function($model) {
                    return date('M d, Y h:i:s A', strtotime($model->created_at));
                }
            ],
			[
                'attribute' => 'updated_at',
                'value' => function($model) {
                    return date('M d, Y h:i:s A', strtotime($model->updated_at));
                }
            ],
			[
				'label' => 'Draft',
				'value' => ucfirst($model->draft),
			],
		],
	]);
?>