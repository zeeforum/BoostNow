<?php
	use yii\helpers\Url;
	use yii\bootstrap\Html;
	use yii\bootstrap\Modal;
	use yii\bootstrap\ActiveForm;

	$this->title = 'Browse Admins';
	$this->params['tab'] = 'admin-users';
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/add']); ?>" class="btn bg-purple btn-flat"> Add Admin</a></li>
	<?php $this->endBlock(); ?>

	<div class="">
		<?php
			$form = ActiveForm::begin([
				'method' => 'get',
				'action' => Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user'])
			]);
		?>

			<div class="form-group col-xs-12 col-sm-4">
				<?php echo $form->field($searchModel, 'username'); ?>
			</div>

			<div class="form-group col-xs-12 col-sm-4">
				<?php echo $form->field($searchModel, 'email'); ?>
			</div>

			<div class="col-xs-12" style="margin-bottom: 10px;">
				<?= Html::submitButton('Search', ['class' => 'button btn btn-primary btn-large']) ?>
			</div>

		<?php 
			ActiveForm::end();
		?>

		<table class="table table-responsive">
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Email</th>
				<th>Status</th>
				<th>Role</th>
				<th>Created At</th>
				<th>Options</th>
			</tr>
			<?php
				if ($model) {
					$counter = 1;
					foreach ($model as $row) {
			?>
			<tr>
				<td><?php echo $counter++; ?></td>
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->email; ?></td>
				<td><?php echo ucfirst($row->status); ?></td>
				<td><?php echo ucfirst($row->role); ?></td>
				<td>
					<?php
						echo $row->created_at;
					?>
				</td>
				<td>
					<a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/view/' . $row->id]); ?>" class="btn btn-primary btn-xs glyphicon glyphicon-eye-open"></a>
					<a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/update/' . $row->id]); ?>" class="btn btn-info btn-xs glyphicon glyphicon-pencil"></a>
					<a data-toggle="modal" data-target="#modal" class="btn btn-danger btn-xs glyphicon glyphicon-trash delete-modal" data-id="<?= $row->id ?>" data-name="<?= $row->username ?>"></a>
				</td>
			</tr>
			<?php
					}
				} else {
			?>
			<tr>
				<td colspan="7" class="text-center">No Record Found!</td>
			</tr>
			<?php
				}
			?>
		</table>

	</div>
	
	<?php
		$url = Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/delete']);
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
				$('.modal-title').text('Delete Admin User: \"' + name + '\"');

				$('#delete-confirm').click(function(e) {
					e.preventDefault();
					window.location = '" . $url . "/' + id;
				});
		   });
		});");
	?>