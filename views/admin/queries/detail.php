<?php
	use yii\widgets\DetailView;
	use yii\helpers\Url;

	$this->title = $model->name . ' - Query';
	$this->params['tab'] = 'queries';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Queries', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'queries/'])];
	$this->params['breadcrumbs'][] = $model->name;
?>

<?php $this->beginBlock('links'); ?>
	<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'queries/']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
<?php $this->endBlock(); ?>

<style type="text/css">
	table.detail-view th {width: 150px;}
</style>

<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'name',
			'email',
			'phone',
			'subject',
			[
                'attribute' => 'message',
                'format' => 'raw',
            ],
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
        ],
	]);
?>