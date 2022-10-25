<div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="labels">

            </div>
            <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
            <div class="caption">
              <h3>{{ $product->name }}</h3>
              <p>{{ $product->price }}</p>
              <p>
                <form action="{{ route('busket-add', $product) }}" method="POST">
                  @csrf
                  <a href="{{ route('product', ['category' => $product->category->code, 'product' => $product->code]) }}" class="btn btn-default" role="button">Подробнее</a>
                  <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                </form>
                </p>
            </div>
          </div>
        </div>
