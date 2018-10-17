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

    <!-- top-navigation -->
	<div class="header-nav nav">
        <div class="container">
            <ul class="nav navbar-nav navbar-right m0">
                <li>
                    <a href="#">save more on app</a>
                </li>
                <li>
                    <a href="#">sell on website</a>
                </li>
                <li>
                    <a href="#">customer care</a>
                </li>
                <li>
                    <a href="#">terms and conditions</a>
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
    <!-- /top-navigation -->

    <!-- header -->
	<div class="container mt10">
        <div class="main-nav">    
            <div class="navbar">
                <div class="col-xs-12 col-sm-4">
                    <a class="navbar-brand f36 mt5" href="#">
                        <span class="light-blue">Boost</span>
                        <span class="light-pink">Now<span>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <ul class="search-nav nav navbar-nav navbar-right">
                        <li class="form">
                            <form class="navbar-form pull-right">
                                <input type="text" class="form-control">
                                <button type="button" class="btn btn-default">Submit</button>
                            </form>
                        </li>
                        <li class="cart-icon">
                            <a href="#">
                                <span class="">
                                    <i class="fa fa-shopping-cart"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /header -->
    
    <!-- header-navigation -->
    <div class="header-main-nav nav">
        <div class="container">
            <ul class="nav navbar-nav m0 categories">
                <li class="dropdown">
                    <a class="dropdown-toggle pointer" data-toggle="dropdown">
                        Categories
                        <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-categories">
                        <li class="dropdown-submenu">
                            <a href="#" class="submenu">
                                Electronic Devices
                                <span class="fa fa-angle-right"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        Mobiles
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Tablets
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Laptops
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Desktops
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Gaming Consoles
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Digital Cameras
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown-submenu">
							<a href="#" class="submenu">
								Health & Beauty
								<span class="fa fa-angle-right"></span>
							</a>
							<ul class="dropdown-menu">
                                <li class="dropdown-submenu">
                                    <a href="#" class="submenu">
										Beauty Tools
										<span class="fa fa-angle-right"></span>
									</a>
									<ul class="dropdown-menu">
										<li>
											<a href="#">
												Curling Irons and Wands
											</a>
										</li>
										<li>
											<a href="#">
												Flat Irons
											</a>
										</li>
										<li>
											<a href="#">
												Multi-stylers
											</a>
										</li>
										<li>
											<a href="#">
												Hair Dryers
											</a>
										</li>
										<li>
											<a href="#">
												Hair Removal Appliances
											</a>
										</li>
									</ul>
                                </li>
                                <li>
                                    <a href="#">
                                        Fragrances
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Makeup
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Men's Care
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Personal Care
                                    </a>
                                </li>
                            </ul>
						</li>
                        <li><a href="#">Babies & Toys</a></li>
                        <li><a href="#">Home & LifeStyle</a></li>
                        <li><a href="#">Women's Fashion</a></li>
                        <li><a href="#">Men's Fashion</a></li>
                        <li><a href="#">Sports & Outdoor</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right m0">
                <li>
                    <a href="#">Global Collection</a>
                </li>
                <li>
                    <a href="#">Coupon Code</a>
                </li>
                <li>
                    <a href="#">track my order</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /header-navigation -->

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
<script>
	$(document).ready(function(){
		$('.dropdown-submenu a.test').on("click", function(e){
			$(this).next('ul').toggle();
			e.stopPropagation();
			e.preventDefault();
		});
	});
</script>
</body>
</html>
<?php $this->endPage() ?>
