@extends('layouts.admin-layout')

@section('right')
  <table class="admin__table">
        <thead>
        <tr>
            <th>Изображение</th>
            <th>Цена <a href="{{ route('products.index', ['sort' => 'price', 'ord' => $ord]) }}" title="сортировать" alt="сортировать">⇅</a></th>

            <th>
              <select name="select_product_page" onchange="location = this.value;" style="width: 100%">
                  <option value="{{ route('products.index') }}" disabled selected>Страницы показа</option>
                  <option value="{{ route('products.index') }}">Все страницы</option>
                  @foreach($pages as $page)
                    <option value="{{ route('products.index', ['filter' => $page->uri]) }}" @if($selectedPage && $selectedPage->uri == $page->uri) selected @endif>{{ $page->meta_title }}</option>
                  @endforeach
              </select>
            </th>
            <th>Порядок <a href="{{ route('products.index', ['sort' => 'order', 'ord' => $ord]) }}" title="сортировать" alt="сортировать">⇅</a></th>
            <th style="text-align: center;" >Опубликовано <a href="{{ route('products.index', ['sort' => 'publish', 'ord' => $ord]) }}" title="сортировать" alt="сортировать">⇅</a></th>
            <th style="text-align: center;">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
          <tr class="admin__tr">
                <td>
                  <div class="preview_img_wrapper">
                    <img id="img_file" src="{{ $product->src }}" alt="{{ $product->alt }}" title="{{ $product->title }}">
                  </div>
                </td>
                <td>{{ $product->price }}</td>
                <td>
                  <ul>
                    @foreach($product->pages as $page)
                      <li>{{ $page->meta_title }}</li>
                    @endforeach
                  </ul>
                </td>
                <td>{{ $product->order }}</td>
                <td style="text-align: center;">{{ $product->publish ? 'Да':'Нет' }}</td>
                <td>
                    <a class="admin__btn" href="{{ route('products.edit', ['product' => $product->id, 'page' => request()->page, 'filter' => request()->filter, 'sort' => request()->sort, 'ord' => request()->ord ]) }}">Редактировать</a>
                    <form style="display: inline-block;" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="admin__btn">{{ $product->publish ? 'Снять с публикации':'Опубликовать' }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  <div class="dfc" style="margin-top: 20px;"><a class="admin__btn" href="{{ route('products.create') }}">Создать</a></div>
  <div class="admin__pagination">{{ $products->links() }}</div>

@endsection
