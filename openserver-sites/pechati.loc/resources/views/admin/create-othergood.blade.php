@extends('layouts.admin-layout')

@section('right')
  <form action="{{ route('othergoods.store') }}" method="post" enctype="multipart/form-data">
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
            <td style="color: red; font-weight: bold;">Название - обязательное поле</td>
            <td>
              <input type="text" name="name" required value="{{ old('name') ?? null }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('name') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Цена</td>
            <td>
              <input type="number" step="any" name="price" value="{{ old('price') ?? null }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('price') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td style="color: red; font-weight: bold;">Изображение - обязательное поле</td>
            <td style="display: flex; justify-content: flex-start; align-items: center;">
              {{--Это код для ckfinder, закомментировать, если не нужен будет--}}
              <div class="preview_img_wrapper">
                <img id="img_file" src="{{ asset('images/no-photo.jpg') }}" alt="" class="preview_img">
              </div>
              <button onclick="openPopup()" class="admin__btn" type="button">Выберите файл</button>
              <input type="text" name="src" id="input_file" readonly />

              {{--раскомментировать если не работает ckfinder, плюс путь редактировать к файлам, добавить storage вроде--}}
             {{-- <input type="file" name="src" accept="image/*" required>--}}
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('src') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>alt</td>
            <td>
              <input type="text" name="alt">
            </td>
          </tr>

          <tr>
            <td>title</td>
            <td>
              <input type="text" name="title">
            </td>
          </tr>

          <tr>
            <td>Страницы показа <span class="help" title="если не выберете, то будет показываться на всех страницах | чтобы отменить выделение зажмите Ctrl">?</span><br> (выделение нескольких через Ctrl)</td>
            <td>
              <select name="pages_for_othergoods[]" multiple style="height: 140px;">
                  <option value="0">Все</option>
                @foreach($pages as $page)
                  <option value="{{ $page->id }}">{{ $page->meta_title}}</option>
                @endforeach
              </select>
            </td>
          </tr>

          <tr>
            <td>Порядок (приоритет)</td>
            <td>
              <input type="number" step="any" name="order" value="1">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('order') {{ $message }} @enderror</span>
            </td>
          </tr>


        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center;">
            <button class="admin__btn" type="submit">Сохранить</button>  {{--- здесь нужно будет перекешировать --}}
        </div>
    </form>


@endsection



