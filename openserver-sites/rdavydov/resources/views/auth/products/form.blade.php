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
                            @include('auth.layouts.error', ['fieldName' => 'code'])
                                <input type="text" class="form-control" name="code" id="code"
                                       value="@isset($product){{ $product->code }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="name" class="col-sm-2 col-form-label">Название: </label>
                        <div class="col-sm-6">
                             @include('auth.layouts.error', ['fieldName' => 'name'])
                                <input type="text" class="form-control" name="name" id="name"
                                       value="@isset($product){{ $product->name }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="name_en" class="col-sm-2 col-form-label">Название на англ: </label>
                        <div class="col-sm-6">
                             @include('auth.layouts.error', ['fieldName' => 'name_en'])
                            <input type="text" class="form-control" name="name_en" id="name_en"
                                   value="@isset($product){{ $product->name_en }} @endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="category_id" class="col-sm-2 col-form-label">Категория: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error', ['fieldName' => 'category_id'])
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
                            @include('auth.layouts.error', ['fieldName' => 'description'])
                                <input type="text" class="form-control" name="description" id="description"
                                       value="@isset($product){{ $product->description }}@endisset">
                        </div>
                    </div>
                    <br>
                    <div class="input-group row">
                        <label for="description_en" class="col-sm-2 col-form-label">Описание на англ.: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error', ['fieldName' => 'description_en'])
                            <input type="text" class="form-control" name="description_en" id="description_en"
                                   value="@isset($product){{ $product->description_en }}@endisset">
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

            <div class="input-group row">
                        <label for="category_id" class="col-sm-2 col-form-label">Свойства товара: </label>
                        <div class="col-sm-6">
                            @include('auth.layouts.error', ['fieldName' => 'property_id'])
                            <select name="property_id[]"  class="form-control my-form-control" multiple>
                                    @foreach($properties as $property)
                                    <option value="{{ $property->id }}" @isset($product)  @if($product->properties->contains($property->id)) selected @endif @endisset>{{ $category->name }}</option>
                                @endforeach
                                </select>
                        </div>
                    </div>
            <br>
            @foreach([
    'hit' => 'Хит',
    'new' => 'Новинка',
    'recommend' => 'Рекомендуемое'] as $field => $title)
                <div class="input-group row">
                        <label for="{{ $field }}" class="col-sm-2 col-form-label">{{ $title }}</label>
                        <div class="col-sm-6">
                                <input type="checkbox" class="form-control" name="{{ $field }}" id="{{ $field }}"
                                           @if(isset($product) && $product->$field == 1)
                                               checked = 'checked'
                                           @endif>
                        </div>
                    </div>
                <br>
            @endforeach

            <button type="submit" class="btn btn-success">@isset($product) Изменить товар @else Добавить товар @endisset</button>
        </form>

@endsection
