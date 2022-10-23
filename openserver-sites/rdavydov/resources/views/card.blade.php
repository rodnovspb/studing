<div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <div class="labels">

            </div>
            <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
            <div class="caption">
              <h3>iPhone X 64GB</h3>
              <p>71990 ₽</p>
                @isset($category->name)
                {{ $category->name }}
                @endisset
              <p>
                <form action="{{ route('basket') }}" method="POST">
                  <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                  <a href="https://internet-shop.tmweb.ru/mobiles/iphone_x_64" class="btn btn-default" role="button">Подробнее</a>
                  <input type="hidden" name="_token" value="XXIBcC9neFJUjWNMQcqQku8MX4qRFLRICLnTDHz2"> </form>
                </p>
            </div>
          </div>
        </div>
