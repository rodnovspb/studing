<?php
use wfm\View;
//* @var $this View *//
?>

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

<?php if(!empty($products)): ?>

<section class="featured-products">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="section-title">Рекомендуемые товары</h3>
			</div>
   
            <?php $this->getPart('parts/products_loop', compact('products')); ?>
   
		</div>
	</div>
</section>

<?php endif; ?>

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


