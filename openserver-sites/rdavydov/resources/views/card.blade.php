<div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="labels">
                @if($product->isNew()) <span class="badge badge-success">Новинка</span>  @endif
                @if($product->isRecommend()) <span class="badge badge-warning">Рекомендуемое</span>  @endif
                @if($product->isHit()) <span class="badge badge-danger">Хит продаж</span>  @endif
            </div>
            <img src="{{ Storage::url($product->image) }}" alt="" height="150px">
            <div class="caption">
              <h3>{{ $product->name }}</h3>
              <p>{{ $product->price }}</p>
              <p>
                <form action="{{ route('busket-add', $product) }}" method="POST">
                  @csrf
                    <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, 'product' => $product->code]) }}" class="btn btn-default" role="button">Подробнее</a>
                    @if($product->isAvailable())
                        <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    @else
                        <button type="submit" class="btn btn-primary" role="button" disabled>Товар не доступен</button>
                    @endif
                </form>
                </p>
            </div>
          </div>
        </div>
