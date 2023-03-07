@extends('layouts.admin-layout')

@section('right')
  <form action="{{ route('products.update', ['product' => $product->id, 'page' => request()->page, 'filter'=> request()->filter, 'sort' => request()->sort, 'ord' => request()->ord]) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <table class="admin__table">
        <thead>
        <tr>
            <th class="first_col">Поле</th>
            <th class="second_col">Содержание</th>
        </tr>
        </thead>
        <tbody>
            <tr>
              <td>
                Тип
              </td>
              <td>
                   <select name="type" id="select_product_type">
                     <option value="template" @if((empty(old('type')) &&  $product->type == 'template') || old('type') == 'template') selected @endif>Макет</option>
                     <option value="case" @if((empty(old('type')) &&  $product->type == 'case') || old('type') == 'case') selected @endif>Оснастка</option>
                   </select>
                   <span style="margin-left: 20px; color: red; font-weight: bold;">@error('type') {{ $message }} @enderror</span>
              </td>
            </tr>
            <tr>
              <td>
                Подтип
              </td>
              <td>
                   <select name="subtypes_for_products[]" id="select_product_subtype" multiple style="height: 90px">
                     @foreach($subtypes as $subtype)
                       <option value="{{ $subtype->id }}" @if(in_array($subtype->id, old('subtypes_for_products') ?? $selectedSubtypes)) selected @endif @if(in_array($subtype->id, [1,2,3])) class="subtype_templates" @elseif(in_array($subtype->id, [4,5,6,7])) class="subtype_cases" @endif>{{ $subtype->name }}</option>
                     @endforeach
                   </select>
                   <span style="margin-left: 20px; color: red; font-weight: bold;">@error('subtypes_for_products') {{ $message }} @enderror</span>
              </td>
            </tr>
            <tr id="name_create_product_page">
              <td style="color: red; font-weight: bold;">
                Название*
              </td>
              <td>
                    <input type="text" name="name" value="{{ old('price') ?? $product->name  }}">
              </td>
            </tr>
            <tr>
              <td>
                Цена
              </td>
              <td>
                    <input type="number" step="any" name="price" value="{{ old('price') ?? $product->price }}">
                    <span style="margin-left: 20px; color: red; font-weight: bold;">@error('price') {{ $message }} @enderror</span>
              </td>
            </tr>
            <tr>
              <td style="color: red; font-weight: bold;">Изображение*</td>
              <td style="display: flex; justify-content: flex-start; align-items: center;">

              <div class="preview_img_wrapper">
                <img id="img_file" src="{{ old('src') ?? $product->src ?? asset('images/no-photo.jpg') }}" alt="" class="preview_img">
              </div>
              <button onclick="openPopup()" class="admin__btn" type="button">Выберите файл</button>
              <input type="text" name="src" id="input_file" readonly value="{{ old('src') ?? $product->src ?? asset('images/no-photo.jpg') }}" />
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('src') {{ $message }} @enderror</span>
              </td>
            </tr>

          <tr>
            <td>Страница показа</td>
            <td>

              <select name="pages_for_products[]" multiple style="height: 140px;" required>
                @foreach($pages as $page)
                  <option value="{{ $page->id }}" @if(in_array($page->id, old('pages_for_products') ?? $selectedPages)) selected @endif>{{ $page->meta_title}}</option>
                @endforeach
              </select>
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('pages_for_products') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Порядок (приоритет)</td>
            <td>
              <input type="number" step="any" name="order" value="{{ old('order') ?? $product->order ?? 1 }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('order') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr id="video_create_product_page">
            <td>Ссылка на видео</td>
            <td>
              <input type="text" name="video" placeholder="Например: https://youtu.be/940FmKntof0" value="{{ old('video') ?? $product->video }}">
            </td>
          </tr>

        <tr>
            <td style="color: red; font-weight: bold;">alt*</td>
            <td>
              <input type="text" name="alt" value="{{ old('alt') ?? $product->alt }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('alt') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>title</td>
            <td>
              <input type="text" name="title" value="{{ old('title') ?? $product->title }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('title') {{ $message }} @enderror</span>
            </td>
          </tr>

        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center;">
            <button class="admin__btn" type="submit">Сохранить</button> {{--- здесь нужно будет перекешировать --}}
            <a class="admin__btn" onclick="return confirm('Удалить?')" href="{{ route('products.show', ['product' => $product->id, 'page' => request()->page, 'filter'=> request()->filter, 'sort' => request()->sort, 'ord' => request()->ord]) }}">Удалить страницу</a>
        </div>
    </form>


@endsection




