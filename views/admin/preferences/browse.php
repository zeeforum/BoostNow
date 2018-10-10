<?php
	use yii\helpers\Url;
	use yii\bootstrap\Html;
	use yii\grid\GridView;
	use app\models\admin\Categories;
	use yii\bootstrap\Modal;

	$this->title = 'Browse Preferences';
	$this->params['tab'] = 'settings';
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
        <li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences/add']); ?>" class="btn bg-purple btn-flat"> Add Preferences</a></li>
        <li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences/website']); ?>" class="btn bg-purple btn-flat"> Website Preferences</a></li>
	<?php $this->endBlock(); ?>

	<div class="">
		<?php
			echo GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					// Simple columns defined by the data contained in $dataProvider.
					// Data from the model's column will be used.
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
						'attribute' => 'created_at',
						'format' => ['date', 'php:Y-m-d']
					],
					// More complex one.
					[
						'class' => 'yii\grid\ActionColumn', // can be omitted, as it is the default
						'buttons' => [
							'delete' => function ($url, $model) {
								return Html::a('', $url, [
									'class'       => 'btn btn-danger btn-xs glyphicon glyphicon-trash delete-modal',
									'data-toggle' => 'modal',
									'data-target' => '#modal',
									'data-id'     => $model->id,
									'data-name'   => $model->label,
								]);
							},
							'update' => function ($url, $model) {
								return Html::a('', $url, [
									'class'       => 'btn btn-info btn-xs glyphicon glyphicon-pencil',
								]);
							},
							'view' => function ($url, $model) {
								return Html::a('', $url, [
									'class'       => 'btn btn-primary btn-xs glyphicon glyphicon-eye-open',
								]);
							},
						],
					],
				],
			]);
		?>
	</div>
	
	<?php
		$url = Url::to([Yii::$app->params['adminAbsUrl'] . 'preferences/delete']);
		Modal::begin([
			'header' => '<h2 class="modal-title"></h2>',
			'id'     => 'deleteModal',
			'footer' => Html::a('Confirm', '', ['class' => 'btn btn-danger', 'id' => 'delete-confirm']),
		]);
	?>

	<?= 'Are you sure you want to perform this action?'; ?>

	<?php Modal::end(); ?>

	<?php
		$this->registerJs("$(function() {
		   $('.delete-modal').click(function(e) {
				e.preventDefault();
				$('#deleteModal').modal('show');
				var modal = $(this);
				var triggered = $(this);
				var id = triggered.data('id');
				var name = triggered.data('name');
				$('.modal-title').text('Delete Preference: \"' + name + '\"');

				$('#delete-confirm').click(function(e) {
					e.preventDefault();
					window.location = '" . $url . "/' + id;
				});
		   });
		});");
	?>