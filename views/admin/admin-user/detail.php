<?php
	use yii\widgets\DetailView;
	use yii\helpers\Url;

	$this->title = $model->username . ' - Admin User';
	$this->params['tab'] = 'admin-users';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Admins', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/'])];
	$this->params['breadcrumbs'][] = $model->username;
?>

<?php $this->beginBlock('links'); ?>
	<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
<?php $this->endBlock(); ?>

<style type="text/css">
	table.detail-view th {width: 150px;}
</style>

<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'username',
			'email',
            'description',
            [
                'attribute' => 'picture',
                'label' => 'Profile Picture',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->picture != '') {
                        return '<img src="' . Yii::$app->params['imageUrl'] . 'profile/' . $data->picture . '" class="img img-responsive" />';
                    } else {
                        return '(not set)';
                    }
                }
            ],
			[
                'attribute' => 'status',
                'value' => function($data) {
                    return ucfirst($data->status);
                }
            ],
			[
                'attribute' => 'role',
                'value' => function($data) {
                    return ucfirst($data->role);
                }
            ],
			[
                'attribute' => 'created_at',
                'value' => function($model) {
                    return date('M d, Y h:i:s A', strtotime($model->created_at));
                }
            ],
		],
	]);
?>