<?php
	use yii\widgets\DetailView;
	use yii\helpers\Url;

	$this->title = $model->label . ' - Preferences';
	$this->params['tab'] = 'settings';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Preferences', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences'])];
	$this->params['breadcrumbs'][] = $model->label;
?>

<?php $this->beginBlock('links'); ?>
	<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
<?php $this->endBlock(); ?>

<style type="text/css">
	table.detail-view th {width: 150px;}
</style>

<?php
	echo DetailView::widget([
		'model' => $model,
		'attributes' => [
			'name',
			'label',
			[
                'attribute' => 'field_type',
                'label' => 'Field Type',
                'value' => function($data) {
                    return ucfirst($data->field_type);
                }
            ],
            [
                'attribute' => 'value',
                'label' => 'Content',
                'format' => 'raw',
                'value' => function($data) {
                    $str = '(not set)';
                    if ($data->field_type == 'image') {
                        if ($data->value) {
                            return '<img src="' . Yii::$app->params['imageUrl'] . 'preferences/' . $data->value . '" class="img img-responsive" />';
                        } else {
                            return $str;
                        }
                    } else if ($data->field_type == 'file') {
                        if ($data->value != '') {
                            return '<a href="' . Yii::$app->params['imageUrl'] . 'preferences/' . $data->value . '">File Link</a>';
                        } else {
                            return $str;
                        }
                    } else {
                        return $data->value;
                    }
                }
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
		],
	]);
?>