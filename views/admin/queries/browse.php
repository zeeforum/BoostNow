<?php
	use yii\helpers\Url;
	use yii\bootstrap\Html;
	use yii\grid\GridView;
	use yii\bootstrap\Modal;

	$this->title = 'Browse Queries';
	$this->params['tab'] = 'queries';
	$this->params['breadcrumbs'][] = $this->title;
?>
    <style type="text/css">
        .queries-table .empty {text-align:center;}
        .message-unread {background-color: #c1d7ff !important;}
    </style>
	<div class="">
		<?php
			echo GridView::widget([
				'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'rowOptions' => function($model) {
                    if ($model->is_read == 'no') {
                        return ['class' => 'message-unread'];
                    }
                },
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],
					// Simple columns defined by the data contained in $dataProvider.
					// Data from the model's column will be used.
                    'name',
                    'email',
                    [
                        'attribute' => 'phone',
                        'label' => 'Phone',
                        'value' => function($data) {
                            if ($data->phone != '') {
                                return $data->phone;
                            } else {
                                return '(not set)';
                            }
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
									'data-name'   => $model->name,
								]);
							},
							'update' => function ($url, $model) {
								return '';
							},
							'view' => function ($url, $model) {
								return Html::a('', $url, [
									'class'       => 'btn btn-primary btn-xs glyphicon glyphicon-eye-open',
								]);
							},
						],
					],
                ],
                'tableOptions' => ['class' => 'table table-striped table-bordered queries-table'],
			]);
		?>
	</div>
	
	<?php
		$url = Url::to([Yii::$app->params['adminAbsUrl'] . 'queries/delete']);
		Modal::begin([
			'header' => '<h4 class="modal-title"></h4>',
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
				$('.modal-title').text('Delete Query: \"' + name + '\"');

				$('#delete-confirm').click(function(e) {
					e.preventDefault();
					window.location = '" . $url . "/' + id;
				});
		   });
		});");
	?>