<?php require_once 'inc/functions.php'?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="css/main.css">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<sections class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="card">
  					<img src="http://via.placeholder.com/300x200" class="card-img-top" alt="...">
  					<div class="card-body">
    					<h5 class="card-title">Товар 1</h5>
    					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  	<p class="price text-danger">100 руб.</p>
    					<a href="#" class="btn btn-primary buy" data-price = "100" data-product = "Товар 1">Купить</a>
  					</div>
				</div>
            </div>
		  	<div class="col-md-4 col-sm-6">
			  	<div class="card">
  					<img src="http://via.placeholder.com/300x200" class="card-img-top" alt="...">
  					<div class="card-body">
    					<h5 class="card-title">Товар 2</h5>
    					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  	<p class="price text-danger">110 руб.</p>
    					<a href="#" class="btn btn-primary buy" data-price = "110" data-product = "Товар 2">Купить</a>
  					</div>
				</div>
			</div>
		  	<div class="col-md-4 col-sm-6">
			  	<div class="card">
  					<img src="http://via.placeholder.com/300x200" class="card-img-top" alt="...">
  					<div class="card-body">
    					<h5 class="card-title">Товар 3</h5>
    					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  	<p class="price text-danger">120 руб.</p>
    					<a href="#" class="btn btn-primary buy" data-price = "120" data-product = "Товар 3">Купить</a>
  					</div>
				</div>
			</div>
		  	<div class="col-md-4 col-sm-6">
			  	<div class="card">
  					<img src="http://via.placeholder.com/300x200" class="card-img-top" alt="...">
  					<div class="card-body">
    					<h5 class="card-title">Товар 4</h5>
    					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  	<p class="price text-danger">130 руб.</p>
    					<a href="#" class="btn btn-primary buy" data-price = "130" data-product = "Товар 4">Купить</a>
  					</div>
				</div>
			</div>
		  	<div class="col-md-4 col-sm-6">
			  	<div class="card">
  					<img src="http://via.placeholder.com/300x200" class="card-img-top" alt="...">
  					<div class="card-body">
    					<h5 class="card-title">Товар 5</h5>
    					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  	<p class="price text-danger">140 руб.</p>
    					<a href="#" class="btn btn-primary buy" data-price = "140" data-product = "Товар 5">Купить</a>
  					</div>
				</div>
			</div>
		  	<div class="col-md-4 col-sm-6">
			  	<div class="card">
  					<img src="http://via.placeholder.com/300x200" class="card-img-top" alt="...">
  					<div class="card-body">
    					<h5 class="card-title">Товар 6</h5>
    					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  	<p class="price text-danger">150 руб.</p>
    					<a href="#" class="btn btn-primary buy" data-price = "150" data-product = "Товар 6">Купить</a>
  					</div>
				</div>
			</div>
        </div>
    </div>
</sections>














<div class="modal fade" id="cart">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Оформление заказа</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="buy" method="post">
 			<div class="mb-3">
 			  <label for="name" class="form-label">Ваше имя</label>
 			  <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required>
 			</div>
 			<div class="mb-3">
 			  <label for="email" class="form-label">Эл. почта"</label>
 			  <input type="email"  name="email" class="form-control" id="email" placeholder="Ваша почта" required>
 			</div>
 			<div class="mb-3">
 			  <label for="product" class="form-label">Выбранный товар"</label>
 			  <input type="text"  name="product" class="form-control" id="product" readonly>
 			</div>
		  	<div class="mb-3">
 			  <label for="price" class="form-label">Цена"</label>
 			  <input type="text"  name="price" class="form-control" id="price" readonly>
 			</div>
 			<button type="submit" class="btn btn-primary">Купить</button>
		</form>
      </div>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script src="js/main.js"></script>

</body>
</html>
