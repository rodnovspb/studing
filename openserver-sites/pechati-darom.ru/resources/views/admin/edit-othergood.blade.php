@extends('layouts.admin-layout')

@section('right')
  <form action="{{ route('othergoods.update', ['othergood' => $good->id, 'page' => request()->page, 'filter'=> request()->filter]) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf
    <table class="admin__table">
        <thead>
        <tr>
            <th class="first_col">Поле</th>
            <th class="second_col">Содержание</th>
        </tr>
        </thead>

        <tbody>

          <tr>
            <td style="color: red; font-weight: bold;">Название*</td>
            <td>
              <input type="text" maxlength="255" name="name" required value="{{ old('name') ?? $good->name }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('name') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Цена</td>
            <td>
              <input type="number" max="999999" step="any" name="price" value="{{ old('price') ?? $good->price }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('price') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Изображение</td>
            <td style="display: flex; justify-content: flex-start; align-items: center;">
              {{--Это код для ckfinder, закомментировать, если не нужен будет--}}
              <div class="preview_img_wrapper">
                <img id="img_file" src="{{ $good->src }}" alt="{{ $good->alt }}" title="{{ $good->title }}">
              </div>
              <button onclick="openPopup()" class="admin__btn" type="button">Выберите файл</button>
              <input type="text" maxlength="255" value="{{ $good->src }}" name="src" id="input_file" readonly/>

              {{--Это для обычного выбора файлов--}}
             {{-- <img src="{{  $good->src }}" alt="" style="margin-right: 30px;" class="preview_img">
              <input  type="file" name="src" accept="image/*">--}}
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('src') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>alt</td>
            <td>
              <input type="text" maxlength="255" name="alt" value="{{ old('alt') ?? $good->alt }}">
            </td>
          </tr>

          <tr>
            <td>title</td>
            <td>
              <input type="text" maxlength="255" name="title" value="{{ old('title') ?? $good->title }}">
            </td>
          </tr>

          <tr>
            <td>Страницы показа <span class="help" title="если не выберете, то будет показываться на всех страницах | чтобы отменить выделение зажмите Ctrl">?</span><br> (выделение нескольких через Ctrl)</td>
            <td>
              <select name="pages_for_othergoods[]" multiple style="height: 140px;">
                  <option value="0">Все</option>
                @foreach($pages as $page)
                  <option value="{{ $page->id }}" @if(in_array($page->id, $selectedPages)) selected @endif>{{ $page->meta_title}}</option>
                @endforeach
              </select>
            </td>
          </tr>

          <tr>
            <td>Порядок (приоритет)</td>
            <td>
              <input type="number" max="999999" step="any" name="order" value="{{ old('order') ?? $good->order }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('order') {{ $message }} @enderror</span>
            </td>
          </tr>

        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center;">
            <button class="admin__btn" type="submit">Сохранить</button>  {{--- здесь нужно будет перекешировать--}}
            <a class="admin__btn" onclick="return confirm('Удалить?')" href="{{ route('othergoods.show', ['othergood' => $good->id]) }}">Удалить страницу</a>


        </div>
    </form>
@endsection



