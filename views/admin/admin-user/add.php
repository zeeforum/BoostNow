<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

	if (isset($command) && $command == 'edit') {
		$this->title = 'Edit Admin';
		$btnText = 'Update';
	} else {
		$this->title = 'Add Admin';
		$btnText = 'Add New Admin';
	}
	
	$this->params['tab'] = 'admin-users';
	$this->params['breadcrumbs'][] = ['label' => 'Browse Admins', 'url' => Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/'])];
	$this->params['breadcrumbs'][] = $this->title;
?>

	<?php $this->beginBlock('links'); ?>
		<li><a href="<?= Url::to([Yii::$app->params['adminAbsUrl'] . 'admin-user/']); ?>" class="btn bg-purple btn-flat"> Go Back</a></li>
	<?php $this->endBlock(); ?>

	<?php $form = ActiveForm::begin(['id' => 'admin-form']); ?>
	
		<div class="row">
			
			<div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'username'); ?>
			</div>
			<!-- /.form-group -->

            <div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'email'); ?>
			</div>
			<!-- /.form-group -->
            <div class="clearfix"></div>

            <div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'picture')->fileInput(['accept' => 'image/*']); ?>
			</div>
			<!-- /.form-group -->

            <div class="form-group col-xs-12 col-sm-6">
				<?php echo $form->field($model, 'password')->passwordInput(); ?>
			</div>
			<!-- /.form-group -->
            <div class="clearfix"></div>

            <div class="form-group col-xs-12">
				<?php echo $form->field($model, 'description')->textarea(); ?>
			</div>
			<!-- /.form-group -->
            <div class="clearfix"></div>

			<div class="form-group col-sm-6">
				<?php
					$status = array(
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'expire' => 'Expire',
                        'ban' => 'Ban',
                        'block' => 'Block',
                    );
					
					echo $form->field($model, 'status')->dropdownList($status);
				?>
			</div>
			<!-- /.form-group -->

			<div class="form-group col-sm-6">
				<?php
					$roles = array(
                        'admin' => 'Admin',
                        'editor' => 'Editor',
                        'author' => 'Author',
                        'contributor' => 'Contributor',
                    );
					
					echo $form->field($model, 'role')->dropdownList($roles);
				?>
			</div>
			<!-- /.form-group -->

			<div class="col-xs-12">
				<?= Html::submitButton($btnText, ['class' => 'button btn btn-primary btn-large']) ?>
			</div>
			
		</div>
		<!-- /.row -->

	<?php ActiveForm::end(); ?>