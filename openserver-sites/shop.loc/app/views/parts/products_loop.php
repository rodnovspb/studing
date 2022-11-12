<?php foreach ($products as $product): ?>
    <div class="col-lg-4 col-sm-6 mb-3">
				<div class="product-card">
					<div class="product-tumb">
						<a href="product/<?= $product['slug'] ?>"><img src="<?= PATH . $product['img'] ?>" alt=""></a>
					</div>
					<div class="product-details">
						<h4><a href="product/<?= $product['slug'] ?>"><?= $product['title'] ?></a></h4>
						<p><?= $product['exerpt'] ?></p>
						<div class="product-bottom-details d-flex justify-content-between">
							<div class="product-price">
                                <?php if($product['old_price']): ?>
                                    <small>$<?= $product['old_price'] ?></small>
                                <?php endif; ?>
                                $<?= $product['price'] ?>
                            </div>
							<div class="product-links">
								<a class="add-to-cart" href="cart/add?id=<?= $product['id'] ?>" data-id="<?= $product['id'] ?>"><?= get_cart_icon($product['id']) ?></i></a>
								<a href="#"><i class="far fa-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php endforeach; ?>
