@extends('auth.layouts.master')

@isset($product)
    @section('title', "Редактировать товар $product->name")
@else
    @section('title', "Создать товар")
@endisset

@section('content')
    <div class="col-md-12">
    @isset($product)
            <h1>Редактировать товар {{ $product->name }}</h1>
    @else
            <h1>Создать товар</h1>
    @endisset

        <form method="POST" enctype="multipart/form-data"
        @isset($product)
            action="{{ route('products.update', $product) }}">
        @else
            action="{{ route('products.store') }}">
        @endisset

            <div>
                @isset($product)
                    @method('put')
                @endisset
                @csrf
                    <div class="input-group row">
                        <label for="code" class="col-sm-2 col-form-label">Код: </label>
                        <div class="col-sm-6">
                                <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{ $product->code }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="code" class="col-sm-2 col-form-label">Название: </label>
                        <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="name"
                                       value="@isset($product){{ $product->name }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                        <div class="col-sm-6">
                                <select name="category_id" id="category_id" class="form-control my-form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @isset($product)  @if($category->id == $product->category_id) selected @endif @endisset>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="description" class="col-sm-2 col-form-label">Описание: </label>
                        <div class="col-sm-6">
                                <input type="text" class="form-control" name="description" id="description"
                                       value="@isset($product){{ $product->description }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="price" class="col-sm-2 col-form-label">Цена: </label>
                        <div class="col-sm-6">
                                <input type="text" class="form-control" name="price" id="price"
                                       value="@isset($product){{ $product->price }}@endisset">
                        </div>
                    </div>
                    <br>
                   <div class="input-group row">
                      <label for="image" class="col-sm-2 col-form-label">Картинка: </label>
                      <div class="col-sm-10">
                          <label class="btn btn-default btn-file">
                              Загрузить <input type="file" style="display: none;" name="image" id="image">
                          </label>
                      </div>
                  </div>
                  <br>
            </div>
           <button type="submit" class="btn btn-success">@isset($product) Изменить товар @else Добавить товар @endisset</button>

        </form>




@endsection
