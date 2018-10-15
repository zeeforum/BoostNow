<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
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
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    
    <div class="m0 br0 alert alert-success text-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Thank you for visiting our page.
    </div>

	<div class="header-nav nav">
        <div class="container">
            <ul class="nav navbar-nav navbar-right m0">
                <li class="active">
                    <a href="#">save more on app</a>
                </li>
                <li>
                    <a href="#">sell on website</a>
                </li>
                <li>
                    <a href="#">customer care</a>
                </li>
                <li>
                    <a href="#">track my order</a>
                </li>
                <li>
                    <a href="#">login</a>
                </li>
                <li>
                    <a href="#">sign up</a>
                </li>
            </ul>
        </div>
	</div>

	<div class="container mt10">
        <div class="main-nav">    
            <div class="navbar">
                <a class="navbar-brand f36 mt5" href="#">
                    <span class="light-blue">Boost</span>
					<span class="light-pink">Now<span>
                </a>
                <ul class="search-nav nav navbar-nav navbar-right">
                    <li class="form">
                        <form class="navbar-form pull-right">
                            <input type="text" class="form-control">
                            <button type="button" class="btn btn-default">Submit</button>
                        </form>
                    </li>
                    <li>
                        <span class="">
                            <i class="mt15 fa fa-shopping-cart"></i>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->params['website_title']; ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
