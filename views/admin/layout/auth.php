<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AuthAsset;

AuthAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<?php $this->head() ?>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="/js/html5shiv.min.js"></script>
	<script src="/js/respond.min.js"></script>
	<![endif]-->
	<style>
		.no-gutter {margin:0px;padding:0px;}
		.no-margin {margin:0px;}
		.no-padding {padding:0px;}
		.error {background-color:#337AB7 !important;color:#FFF;padding:5px 10px;font-weight:normal;}
		.clearfix {clear:both;}
		.imsg {padding: 10px 0px !important;font-size: 16px;color: #000 !important;border: 1px solid #F00;font-weight: bold;box-shadow: #F00 1px 1px;}
		.td-actions > a {font-size:11px;margin:0px 2px;}
		.badge{margin-left:10px;}
		.social-list {list-style: none;margin-top:5px;margin-left: none;}
		.social-list li {display: inline-block;border:1px solid #000;padding:3px 5px;}
		.zposts {background: #FFF;margin:5px 0;padding: 10px;border:1px solid #000;box-shadow: 2px 2px #CCC;}
		.pagination a ,.pagination span {display: inline-block;padding: 5px 10px;background: #FFF;border: 1px solid;margin: 0px 2px;box-shadow: 2px 2px #CECECE}
		.pagination a:hover {background: #615f5f;color: #FFF;}
		.navbar {background-color:#3C8DBC;}
		.navbar > .navbar-inner > .container > .brand {color:#FFF !important;padding:15px !important;font-size:26px;font-weight:bold;display:block;}
		.badge-error {visibility:hidden;font-size:12px;}
		.error {margin:0px;font-size:16px !important;font-weight:bold !important;width: 100%;text-align: left;}
		.clear {clear:both;}
		.badge-error {display:block;background-color:#d9534f !important;margin:2px 0px;}
		.form-group {margin-bottom: 0px;}
	</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<?php $this->beginBody() ?>

	<div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="<?= Yii::$app->params['base_url'] ?>"><?= Yii::$app->params['website_title'] ?></a>
            </div> <!-- /container -->
        </div>
	</div>

	<?= $content ?>


	<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>