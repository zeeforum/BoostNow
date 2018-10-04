<?php
	use yii\widgets\DetailView;
	use yii\helpers\Url;

	$this->title = $model->name . ' - Category';
	$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'categories'])];
	$this->params['breadcrumbs'][] = $model->name;
?>

<?php $this->beginBlock('links'); ?>
	<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'categories']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
<?php $this->endBlock(); ?>

<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'name',
			'description',
			'keywords',
			'detail',
			'parentCategory.name',
			'admin.username',
			'created_at:datetime',
			'updated_at:datetime',
		],
	]);
?>