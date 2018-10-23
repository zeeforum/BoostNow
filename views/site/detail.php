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

			<div class="prices">
				<div class="product-price">Rs. 989.45</div>
				<div class="cut-price">Rs. 1050.45</div>
			</div>

			<div class="quantity">
				<span class="text">Quantity:</span>
				<span class="quantity-fields">
					<i class="fa fa-minus pointer"></i>
					<input type="number" name="quantity" value="1" />
					<i class="fa fa-plus pointer"></i>
				</span>
			</div>

			<div class="btns">
				<button class="btn btn-primary btn-boostnow col-xs-12 col-sm-4">Buy Now</button>
				<button class="btn btn-primary btn-cart col-xs-12 col-sm-4 ml5">Add to Cart</button>
			</div>
			<div class="clearfix"></div>

			<div class="product-icons">
				<a class="ml0" href="#"><i class="fa fa-share-alt"></i></a>
				<a href="#"><i class="fa fa-heart-o"></i></a>
			</div>

			<div class="in-stock">
				<span>Category: </span>
				<a href="#">Men's Fashion</a>
				<a href="#">Smart Tech</a>
			</div>
		</div>
		<!-- /price-detail -->
	</div>

	<div class="product-content product-detail">
		<!-- product-detail-box -->
		<div class="col-xs-12 col-sm-9">
			<h5 class="tab-heading">Description</h5>
			<table class="table table-responsive">
				<tr>
					<th>Name</th>
					<th>Content/Value</th>
				</tr>
				<tr>
					<td>Product Name</td>
					<td>Stunt Car Toy Ben 10 - 360 Degree Rotation</td>
				</tr>
				<tr>
					<td>Product Size</td>
					<td>18 inch</td>
				</tr>
			</table>
			<p>Lorem ipsum dolor sit amet, <strong>consectetur</strong> adipiscing <a href="#">elit</a>. Phasellus pretium rhoncus urna id fermentum. Ut imperdiet urna ac est ultrices vulputate. Cras vel vehicula orci, a tincidunt velit. Praesent tristique mollis tempor. Vivamus hendrerit arcu ligula, vel volutpat metus volutpat vel. Proin eleifend ex magna, ac pellentesque neque accumsan vel. Praesent a elementum tortor.</p>
			<p>Etiam ornare mauris mollis, ullamcorper nunc ac, malesuada mauris. Donec in bibendum urna. Vestibulum pharetra tellus velit, fringilla lacinia erat viverra vel. Morbi in vulputate lectus. In libero sapien, viverra a mauris ut, pellentesque vestibulum eros. Nulla dapibus faucibus enim, a egestas ante tincidunt quis. Fusce suscipit ex sed metus ultricies condimentum. Aenean hendrerit accumsan ante, vel pulvinar odio elementum quis. Nullam neque eros, bibendum a luctus quis, dapibus quis diam. Ut rhoncus nibh a lectus laoreet, non bibendum est elementum.</p>
			<p>Vestibulum varius tortor ut <b>libero ultricies</b> fermentum. Vivamus eu luctus lacus. Aliquam tincidunt iaculis lorem et auctor. Duis varius tempor dolor. Quisque consectetur vulputate lorem vel hendrerit. Integer non hendrerit magna, vel sagittis massa. Quisque hendrerit tellus id augue aliquam, ut tristique turpis commodo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum interdum purus elit, a scelerisque dolor sollicitudin bibendum. Donec non arcu scelerisque, eleifend sapien vitae, dictum neque. Suspendisse pharetra ipsum non nibh egestas bibendum.</p>
			<p>Nunc finibus diam nec lorem <i>laoreet blandit</i>. Duis eget enim vitae turpis mattis tincidunt sit amet eget nunc. Morbi et elit lorem. Vivamus congue accumsan turpis nec fermentum. Donec lobortis orci quis mollis dignissim. Maecenas pretium aliquam nibh, quis congue nisi feugiat et. Vestibulum at arcu ornare, lobortis tellus id, aliquet mi. Nunc porttitor, lectus id tincidunt volutpat, dui dolor convallis tellus, quis condimentum orci enim sit amet nunc. Nulla eget ligula vulputate, malesuada augue eu, tincidunt dui. Integer vitae est ac mauris tincidunt mattis. Nam eu diam a turpis congue placerat. Sed pretium varius suscipit.</p>
			<blockquote>This is the test <u>contribution</u> of the data.</blockquote>
			<p>Nam non orci luctus mi gravida fermentum. Donec sit amet pretium nisl. Duis egestas lectus et mi sagittis lobortis id in purus. Vivamus varius faucibus elementum. Aliquam eget metus et tellus mattis hendrerit ut a magna. Etiam pharetra libero non nisl faucibus, vel pharetra diam imperdiet. Vestibulum rhoncus turpis nec faucibus pulvinar.</p>
			<center>Center Content</center>
			<h3>Heading 1</h3>
			<ol>
				<li>List Item 1</li>
				<li>List Item 2</li>
				<li>List Item 3</li>
				<li><a href="#">List Item 4</a></li>
			</ol>

			<code><?= __FILE__ ?></code>
		</div>
		<!-- /product-detail-box -->

		<!-- best-seller -->
		<div class="col-xs-12 col-sm-3 best-seller p0">
			<h5 class="col-xs-12 tab-heading text-center">Best Sellers</h5>

			<div class="col-xs-12 product-box">
				<div class="product-item pointer">
					<a href="#">
						<img src="<?= Yii::$app->params['base_url']; ?>img/product3.jpg" alt="Product 1">
						<div class="product-row">
							<h5 class="product-title">
								<a href="#">Dry Ginger Powder (Sonth Powder) - 250 gm</a>
							</h5>
							<p class="product-price">Rs. 2,000</p>
							<p class="cut-price">Rs. 2,500</p>
						</div>
					</a>
				</div>
			</div>

			<div class="col-xs-12 product-box">
				<div class="product-item pointer">
					<a href="#">
						<img src="<?= Yii::$app->params['base_url']; ?>img/product1.jpg" alt="Product 1">
						<div class="product-row">
							<h5 class="product-title">
								<a href="#">Dry Ginger Powder (Sonth Powder) - 250 gm</a>
							</h5>
							<p class="product-price">Rs. 2,000</p>
							<p class="cut-price">Rs. 2,500</p>
						</div>
					</a>
				</div>
			</div>
		</div>
		<!-- /best-seller -->
	</div>

	<!-- related-items -->
	<div class="col-xs-12 related-items">
		<h5 class="tab-heading">People Who Viewed This Item Also Viewed</h5>

		<div class="category-products">
			<div class="col-xs-12 col-sm-2 product-box">
				<div class="product-item pointer">
					<a href="#">
						<img src="<?= Yii::$app->params['base_url']; ?>img/product3.jpg" alt="Product 1">
						<div class="product-row">
							<h5 class="product-title">
								<a href="#">Dry Ginger Powder (Sonth Powder) - 250 gm</a>
							</h5>
							<p class="product-price">Rs. 2,000</p>
							<p class="cut-price">Rs. 2,500</p>
						</div>
					</a>
				</div>
			</div>

			<div class="col-xs-12 col-sm-2 product-box">
				<div class="product-item pointer">
					<a href="#">
						<img src="<?= Yii::$app->params['base_url']; ?>img/product1.jpg" alt="Product 1">
						<div class="product-row">
							<h5 class="product-title">
								<a href="#">Dry Ginger Powder (Sonth Powder) - 250 gm</a>
							</h5>
							<p class="product-price">Rs. 2,000</p>
							<p class="cut-price">Rs. 2,500</p>
						</div>
					</a>
				</div>
			</div>

			<div class="col-xs-12 col-sm-2 product-box">
				<div class="product-item pointer">
					<a href="#">
						<img src="<?= Yii::$app->params['base_url']; ?>img/product2.jpg" alt="Product 1">
						<div class="product-row">
							<h5 class="product-title">
								<a href="#">Dry Ginger Powder (Sonth Powder) - 250 gm</a>
							</h5>
							<p class="product-price">Rs. 2,000</p>
							<p class="cut-price">Rs. 2,500</p>
						</div>
					</a>
				</div>
			</div>

			<div class="col-xs-12 col-sm-2 product-box">
				<div class="product-item pointer">
					<a href="#">
						<img src="<?= Yii::$app->params['base_url']; ?>img/product4.jpg" alt="Product 1">
						<div class="product-row">
							<h5 class="product-title">
								<a href="#">Dry Ginger Powder (Sonth Powder) - 250 gm</a>
							</h5>
							<p class="product-price">Rs. 2,000</p>
							<p class="cut-price">Rs. 2,500</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<!-- /related-items -->
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