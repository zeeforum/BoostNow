<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Stunt Car Toy Ben 10 - 360 Degree Rotation';
$this->params['breadcrumbs'][] = $this->title;

$url = Yii::$app->params['base_url'];
?>

<div class="product-detail">
	<div class="row detail-grid">
		<!-- flex-slider -->
		<div class="col-xs-12 col-sm-6">
			<div class="flexslider">
				<ul class="slides">
					<li data-thumb="<?= $url; ?>img/product1.jpg">
						<div class="thumb-image"> <img src="<?= $url; ?>img/product1.jpg" data-imagezoom="true" class="img-fluid" alt=" "> </div>
					</li>
					<li data-thumb="<?= $url; ?>img/product2.jpg">
						<div class="thumb-image"> <img src="<?= $url; ?>img/product2.jpg" data-imagezoom="true" class="img-fluid" alt=" "> </div>
					</li>
					<li data-thumb="<?= $url; ?>img/product3.jpg">
						<div class="thumb-image"> <img src="<?= $url; ?>img/product3.jpg" data-imagezoom="true" class="img-fluid" alt=" "> </div>
					</li>
					<li data-thumb="<?= $url; ?>img/product4.jpg">
						<div class="thumb-image"> <img src="<?= $url; ?>img/product4.jpg" data-imagezoom="true" class="img-fluid" alt=" "> </div>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- /flex-slider -->

		<!-- price-detail -->
		<div class="col-xs-12 col-sm-6 product-summary">
			<div class="page-title product-title">
				<h1 class="page m0 mb5">
					<?= Html::encode($this->title) ?>
					
				</h1>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="product-rating">
						<div class="stars">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o"></i>
							<i class="fa fa-star-o"></i>
							<a href="#">2 Ratings</a>
						</div>
					</div>
				</div>
			</div>

			<div class="product-price">Rs. 989.45</div>
			<div class="cut-price">Rs. 1050.45</div>
			<div class="quantity">
				<span class="text">Quantity:</span>
				<span class="quantity-fields">
					<i class="fa fa-minus pointer"></i>
					<input type="number" name="quantity" />
					<i class="fa fa-plus pointer"></i>
				</span>
			</div>

			<div class="btns">
				<button class="btn btn-primary btn-boostnow">Buy Now</button>
				<button class="btn btn-primary btn-cart">Add to Cart</button>
			</div>

			<div class="product-icons">
				<a class="ml0" href="#"><i class="fa fa-share-alt"></i></a>
				<a href="#"><i class="fa fa-heart-o"></i></a>
			</div>
		</div>
		<!-- /price-detail -->
	</div>

    

    <code><?= __FILE__ ?></code>
</div>

<?php
	$this->registerCssFile($url . 'css/flexslider.css');
	$this->registerJsFile($url . 'js/jquery.flexslider.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	$this->registerJsFile($url . 'js/imagezoom.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
	$this->registerJs(
		'
		// Can also be used with $(document).ready()
		$(".flexslider").flexslider({
			animation: "slide",
			controlNav: "thumbnails"
		});
		'
	);
?>