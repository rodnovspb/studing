<div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="labels">

            </div>
            <img src="{{ Storage::url($product->image) }}" alt=""  height="150px">
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