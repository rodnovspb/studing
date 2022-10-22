<?php if(!empty($slides)): ?>
<div class="container-fluid my-carousel">

	<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
		<div class="carousel-indicators">
            <?php for ($i=0; $i<count($slides); $i++): ?>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $i ?>" <?php if($i===0) echo 'class="active"'?>  aria-current="true" aria-label="Slide <?= $i ?>"></button>
			
			<?php endfor; ?>
		</div>
		<div class="carousel-inner">
            <?php $i = 1; foreach ($slides as $slide): ?>
			<div class="carousel-item <?php if($i === 1) echo 'active'?>">
				<img src="<?= PATH . $slide->img ?>" class="d-block w-100" alt="...">
			</div>
			<?php $i++; endforeach; ?>
			
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>


</div>
<?php endif; ?>

<section class="featured-products">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="section-title">Рекомендуемые товары</h3>
			</div>

			<div class="col-lg-4 col-sm-6 mb-3">
				<div class="product-card">
					<div class="product-tumb">
						<a href="product.html"><img src="<?= PATH ?>/assets/img/products/iphone_1.jpg" alt=""></a>
					</div>
					<div class="product-details">
						<h4><a href="product.html">iPhone iPhone iPhone iPhone iPhone</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum! 2Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
						<div class="product-bottom-details d-flex justify-content-between">
							<div class="product-price"><small>$96.00</small>$230.99</div>
							<div class="product-links">
								<a href="#"><i class="fas fa-shopping-cart"></i></a>
								<a href="#"><i class="far fa-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-3">
				<div class="product-card">
					<div class="product-tumb">
						<a href="product.html"><img src="<?= PATH ?>/assets/img/products/canon_eos_5d_1.jpg" alt=""></a>
					</div>
					<div class="product-details">
						<h4><a href="product.html">Canon EOS 5D</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
						<div class="product-bottom-details d-flex justify-content-between">
							<div class="product-price"><small>$96.00</small>$230.99</div>
							<div class="product-links">
								<a href="#"><i class="fas fa-shopping-cart"></i></a>
								<a href="#"><i class="far fa-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-3">
				<div class="product-card">
					<div class="product-tumb">
						<a href="product.html"><img src="<?= PATH ?>/assets/img/products/hp_1.jpg" alt=""></a>
					</div>
					<div class="product-details">
						<h4><a href="product.html">HP</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
						<div class="product-bottom-details d-flex justify-content-between">
							<div class="product-price"><small>$96.00</small>$230.99</div>
							<div class="product-links">
								<a href="#"><i class="fas fa-shopping-cart"></i></a>
								<a href="#"><i class="far fa-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-3">
				<div class="product-card">
					<div class="product-tumb">
						<a href="product.html"><img src="<?= PATH ?>/assets/img/products/apple_cinema_30.jpg" alt=""></a>
					</div>
					<div class="product-details">
						<h4><a href="product.html">Apple cinema 30"</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
						<div class="product-bottom-details d-flex justify-content-between">
							<div class="product-price"><small>$96.00</small>$230.99</div>
							<div class="product-links">
								<a href="#"><i class="fas fa-shopping-cart"></i></a>
								<a href="#"><i class="far fa-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-3">
				<div class="product-card">
					<div class="product-tumb">
						<a href="product.html"><img src="<?= PATH ?>/assets/img/products/imac_1.jpg" alt=""></a>
					</div>
					<div class="product-details">
						<h4><a href="product.html">iMac</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
						<div class="product-bottom-details d-flex justify-content-between">
							<div class="product-price"><small>$96.00</small>$230.99</div>
							<div class="product-links">
								<a href="#"><i class="fas fa-shopping-cart"></i></a>
								<a href="#"><i class="far fa-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-sm-6 mb-3">
				<div class="product-card">
					<div class="product-tumb">
						<a href="product.html"><img src="<?= PATH ?>/assets/img/products/imac_1.jpg" alt=""></a>
					</div>
					<div class="product-details">
						<h4><a href="product.html">iMac</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
						<div class="product-bottom-details d-flex justify-content-between">
							<div class="product-price"><small>$96.00</small>$230.99</div>
							<div class="product-links">
								<a href="#"><i class="fas fa-shopping-cart"></i></a>
								<a href="#"><i class="far fa-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

<section class="services">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="section-title">Наши преимущества</h3>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="service-item">
					<p class="text-center"><i class="fas fa-shipping-fast"></i></p>
					<p>Прямые поставки от производителей</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="service-item">
					<p class="text-center"><i class="fas fa-cubes"></i></p>
					<p>Широкий ассортимент товара</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="service-item">
					<p class="text-center"><i class="fas fa-hand-holding-usd"></i></p>
					<p>Приятные и конкуретные цены</p>
				</div>
			</div>

			<div class="col-md-3 col-sm-6">
				<div class="service-item">
					<p class="text-center"><i class="fas fa-user-cog"></i></p>
					<p>Профессиональная консультация и сервис</p>
				</div>
			</div>

		</div>
	</div>
</section>


