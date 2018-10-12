<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use app\assets\AdminAsset;
use app\models\admin\Queries;

AdminAsset::register($this);

$adminUrl = Yii::$app->params['adminAbsUrl'];
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags(); ?>
	<title><?= Html::encode($this->title); ?></title>
	<?php $this->head(); ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="/js/html5shiv.min.js"></script>
	<script src="/js/respond.min.js"></script>
	<![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<?php $this->beginBody(); ?>

	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?= Url::to([$adminUrl]); ?>" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>A</b>P</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>Admin</b>Panel</span>
			</a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<?php
							$queriesModel = Queries::find()->select(['id','name','subject', 'created_at'])->where(['is_read' => 'no'])->orderBy('id desc');
							$counter = $queriesModel->count();
							$queriesModel->limit(5);
							$queriesModel = $queriesModel->all();

							if ($counter > 0) {
						?>
						<!-- Messages: style can be found in dropdown.less-->
						<li class="dropdown messages-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-envelope-o"></i>
								<span class="label label-success"><?= $counter; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have <?= $counter; ?> messages</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<?php foreach ($queriesModel as $query) { ?>
										<li>
											<!-- start message -->
											<a href="<?= Yii::$app->params['adminUrl'] . 'queries/view/' . $query->id; ?>">
												<h4>
													<?= $query->name ?>
													<small><i class="fa fa-clock-o"></i> <?= Yii::$app->formatter->format(strtotime($query->created_at), 'relativeTime') ?></small>
												</h4>
												<p><?= $query->subject; ?></p>
											</a>
										</li>
										<!-- end message -->
										<?php } ?>
									</ul>
								</li>
								<li class="footer"><a href="<?= Yii::$app->params['adminUrl'] . 'queries/'; ?>">See All Messages</a></li>
							</ul>
						</li>
						<?php
							}
						?>
						
						<?php /*
						<!-- Notifications: style can be found in dropdown.less -->
						<li class="dropdown notifications-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-bell-o"></i>
								<span class="label label-warning">10</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 10 notifications</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li>
											<a href="#">
												<i class="fa fa-users text-aqua"></i> 5 new members joined today
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-users text-red"></i> 5 new members joined
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-shopping-cart text-green"></i> 25 sales made
											</a>
										</li>
										<li>
											<a href="#">
												<i class="fa fa-user text-red"></i> You changed your username
											</a>
										</li>
									</ul>
								</li>
								<li class="footer"><a href="#">View all</a></li>
							</ul>
						</li>

						<!-- Tasks: style can be found in dropdown.less -->
						<li class="dropdown tasks-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-flag-o"></i>
								<span class="label label-danger">9</span>
							</a>
							<ul class="dropdown-menu">
								<li class="header">You have 9 tasks</li>
								<li>
									<!-- inner menu: contains the actual data -->
									<ul class="menu">
										<li><!-- Task item -->
											<a href="#">
												<h3>
													Design some buttons
													<small class="pull-right">20%</small>
												</h3>
												<div class="progress xs">
													<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">20% Complete</span>
													</div>
												</div>
											</a>
										</li>
										<!-- end task item -->
										<li><!-- Task item -->
											<a href="#">
												<h3>
													Create a nice theme
													<small class="pull-right">40%</small>
												</h3>
												<div class="progress xs">
													<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">40% Complete</span>
													</div>
												</div>
											</a>
										</li>
										<!-- end task item -->
										<li><!-- Task item -->
											<a href="#">
												<h3>
													Some task I need to do
													<small class="pull-right">60%</small>
												</h3>
												<div class="progress xs">
													<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">60% Complete</span>
													</div>
												</div>
											</a>
										</li>
										<!-- end task item -->
										<li><!-- Task item -->
											<a href="#">
												<h3>
													Make beautiful transitions
													<small class="pull-right">80%</small>
												</h3>
												<div class="progress xs">
													<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
														<span class="sr-only">80% Complete</span>
													</div>
												</div>
											</a>
										</li>
										<!-- end task item -->
									</ul>
								</li>
								<li class="footer">
									<a href="#">View all tasks</a>
								</li>
							</ul>
						</li>*/ ?>

						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<?php if (Yii::$app->params['profilePicture']) { ?><img src="<?= Yii::$app->params['profilePicture']; ?>" class="user-image" alt="<?= Yii::$app->params['username']; ?>"><?php } ?>
								<span class="hidden-xs"><?= Yii::$app->params['username']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<?php if (Yii::$app->params['profilePicture']) { ?><img src="<?= Yii::$app->params['profilePicture']; ?>" class="img-circle" alt="<?= Yii::$app->params['username']; ?>"><?php } ?>
									<p>
										<?= Yii::$app->params['description']; ?>
										<small>Member since <?= Yii::$app->params['date']; ?></small>
									</p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?= Url::to([$adminUrl . 'user/profile']); ?>" class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?= Url::to([$adminUrl . 'user/logout']); ?>" class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul>
						</li>

						<?php /*
						<!-- Control Sidebar Toggle Button -->
						<li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li>*/ ?>
					</ul>
				</div>
			</nav>
		</header>

		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel" <?php if (Yii::$app->params['profilePicture']=='') { ?>style="padding-bottom:50px;"<?php } ?>>
					<div class="pull-left image">
						<?php if (Yii::$app->params['profilePicture']) { ?><img src="<?= Yii::$app->params['profilePicture']; ?>" class="img-circle" alt="<?= Yii::$app->params['username']; ?>"><?php } ?>
					</div>
					<div class="pull-left info">
						<p><?= Yii::$app->params['username']; ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->
				<ul class="sidebar-menu">
					<li class="header">MAIN NAVIGATION</li>
					<li class="tab-dashboard treeview">
						<a href="#">
							<i class="fa fa-dashboard"></i> <span>Dashboard</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= Url::to([$adminUrl . 'user/dashboard/']); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
						</ul>
					</li>
					<li class="tab-categories treeview">
						<a href="#">
							<i class="fa fa-files-o"></i>
							<span>Manage Categories</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?= Url::to([$adminUrl . 'categories']); ?>"><i class="fa fa-circle-o"></i> Browse Categories</a>
							</li>
							<li>
								<a href="<?= Url::to([$adminUrl . 'categories/add']); ?>"><i class="fa fa-circle-o"></i> Add Category</a>
							</li>
						</ul>
					</li>

					<li class="tab-products treeview">
						<a href="#">
							<i class="fa fa-files-o"></i>
							<span>Manage Products</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?= Url::to([$adminUrl . 'products']); ?>"><i class="fa fa-circle-o"></i> Browse Products</a>
							</li>
							<li>
								<a href="<?= Url::to([$adminUrl . 'products/add']); ?>"><i class="fa fa-circle-o"></i> Add Product</a>
							</li>
						</ul>
					</li>

					<li class="tab-settings treeview">
						<a href="#">
							<i class="fa fa-folder"></i>
							<span>Settings</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?= Url::to([$adminUrl . 'preferences/website']); ?>"><i class="fa fa-circle-o"></i> Website Preferences</a>
							</li>
							<li>
								<a href="<?= Url::to([$adminUrl . 'user/profile']); ?>"><i class="fa fa-circle-o"></i> Update Profile</a>
							</li>
							<li>
								<a href="<?= Url::to([$adminUrl . 'user/change-password']); ?>"><i class="fa fa-circle-o"></i> Change Password</a>
							</li>
						</ul>
					</li>

					<li class="tab-admin-users treeview">
						<a href="#">
							<i class="fa fa-folder"></i>
							<span>Manage Admin Users</span>
							<i class="fa fa-angle-left pull-right"></i>
						</a>
						<ul class="treeview-menu">
							<li>
								<a href="<?= Url::to([$adminUrl . 'admin-user/']); ?>"><i class="fa fa-circle-o"></i> Browse Admins</a>
							</li>
							<li>
								<a href="<?= Url::to([$adminUrl . 'admin-user/add/']); ?>"><i class="fa fa-circle-o"></i> Add Admin</a>
							</li>
						</ul>
					</li>

					<li class="tab-queries treeview">
						<a href="<?= Url::to([$adminUrl . 'queries/']); ?>">
							<i class="fa fa-folder"></i>
							<span>Queries</span>
						</a>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<?= Breadcrumbs::widget([
		            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		            'homeLink' => [
		            	'label' => 'Home',
		            	'url' => Url::to([$adminUrl]),
		            ],
		        ]) ?>
			</section>

			<?php
				$emsg = Yii::$app->session->getFlash('emsg');
				$smsg = Yii::$app->session->getFlash('smsg');
				
				if ($emsg) {
			?>
				<div class="alert alert-danger" style="padding: 20px 30px; z-index: 999999; font-size: 16px; font-weight: 600;">
					<a class="pull-right" href="#" class="close" data-dismiss="alert" style="color: rgb(255, 255, 255); font-size: 20px;">×</a>
					<?= $emsg; ?></a>
				</div>
			<?php
				} else if ($smsg) {
			?>
				<div class="alert alert-success" style="padding: 20px 30px; z-index: 999999; font-size: 16px; font-weight: 600;">
					<a class="pull-right" href="#" class="close" data-dismiss="alert" style="color: rgb(255, 255, 255); font-size: 20px;">×</a>
					<?= $smsg; ?></a>
				</div>
			<?php
				}
			?>

			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-lg-12">
						<div class="box box-danger">
							<div class="box-header">
								<h2 class="blue"><i class="fa-fw fa fa-bars"></i><?= $this->title; ?></h2>
								<div class="box-icon">
									<ul class="btn-tasks">
										<?php if (isset($this->blocks['links'])) { ?>
											<?= $this->blocks['links']; ?>
										<?php } ?>
									</ul>
								</div>
							</div>

							<div class="box-body">
								<?= $content ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		</div>
		<!-- /.content-wrapper -->
		
		<footer class="main-footer">
			<div class="pull-right hidden-xs">
				<b>Version</b> <?= Yii::$app->params['app_version']; ?>
			</div>
			<strong>Copyright &copy; <?= date('Y') ?> <a href="<?= Yii::$app->params['base_url']; ?>"><?= Yii::$app->params['website_title']; ?></a>.</strong> All rights
			reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Create the tabs -->
			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
				<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-birthday-cake bg-red"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

									<p>Will be 23 on April 24th</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-user bg-yellow"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

									<p>New phone +1(800)555-1234</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

									<p>nora@example.com</p>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<i class="menu-icon fa fa-file-code-o bg-green"></i>

								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

									<p>Execution time 5 seconds</p>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->

					<h3 class="control-sidebar-heading">Tasks Progress</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Custom Template Design
									<span class="label label-danger pull-right">70%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Update Resume
									<span class="label label-success pull-right">95%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-success" style="width: 95%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Laravel Integration
									<span class="label label-warning pull-right">50%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
								</div>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)">
								<h4 class="control-sidebar-subheading">
									Back End Framework
									<span class="label label-primary pull-right">68%</span>
								</h4>

								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->
				</div>
				<!-- /.tab-pane -->
				
				<!-- Stats tab content -->
				<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
				<!-- /.tab-pane -->

				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<form method="post">
						<h3 class="control-sidebar-heading">General Settings</h3>
						<div class="form-group">
							<label class="control-sidebar-subheading">
								Report panel usage
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>Some information about this general settings option</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Allow mail redirect
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>Other sets of options are available</p>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Expose author name in posts
								<input type="checkbox" class="pull-right" checked>
							</label>

							<p>Allow the user to show his name in blog posts</p>
						</div>
						<!-- /.form-group -->

						<h3 class="control-sidebar-heading">Chat Settings</h3>
						<div class="form-group">
							<label class="control-sidebar-subheading">
								Show me as online
								<input type="checkbox" class="pull-right" checked>
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Turn off notifications
								<input type="checkbox" class="pull-right">
							</label>
						</div>
						<!-- /.form-group -->

						<div class="form-group">
							<label class="control-sidebar-subheading">
								Delete chat history
								<a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
							</label>
						</div>
						<!-- /.form-group -->
					</form>
				</div>
				<!-- /.tab-pane -->
			</div>
		</aside>
		<!-- /.control-sidebar -->

		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>

	</div>
	<!-- ./wrapper -->

	<?php $this->endBody(); ?>

	<script type="text/javascript">
		<?php if (isset($this->params['tab'])) { ?>
			$('.tab-<?= $this->params['tab']; ?>').addClass('active');
		<?php } else { ?>
			$('.tab-dashboard').addClass('active');
		<?php } ?>
	</script>
</body>
</html>
<?php $this->endPage(); ?>