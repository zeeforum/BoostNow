<?php
	use yii\widgets\DetailView;
	use yii\helpers\Url;

	$this->title = $model->title . ' - Pages';
	$this->params['tab'] = 'page';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Pages', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'page'])];
	$this->params['breadcrumbs'][] = $model->title;
?>

<?php $this->beginBlock('links'); ?>
	<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'page']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
<?php $this->endBlock(); ?>

<style type="text/css">
	table.detail-view th {width: 150px;}
</style>

<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'title',
			'page_title',
			'description',
			'keywords',
			[
				'attribute' => 'content',
				'format' => 'raw',
			],
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
				'attribute' => 'section',
				'value' => function($model) {
					return ucwords(str_replace('-', ' ', $model->section));
				}
			],
			[
				'label' => 'Draft',
				'value' => ucfirst($model->draft),
			],
		],
	]);
?>