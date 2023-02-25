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
            <td>Название</td>
            <td>
              <input type="text" name="name" required value="{{ old('name') ?? null }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('name') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Цена</td>
            <td>
              <input type="number" name="price" value="{{ old('price') ?? null }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('price') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Изображение</td>
            <td>
              <input type="file" name="src" accept="image/*">
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
            <td>На каких типах страниц показывать</td>
            <td>
              <select name="tmpl_for_othergoods[]" multiple>
                  <option value="0">Все</option>
                @foreach($templates as $template)
                  <option value="{{ $template->id }}">{{ $template->name }}</option>
                @endforeach
              </select>
            </td>
          </tr>

          <tr>
            <td>Либо страницы показа</td>
            <td>
              <select name="pages_for_othergoods[]" multiple>
                  <option value="0">Все</option>
                @foreach($pages as $page)
                  <option value="{{ $page->id }}">{{ $page->meta_title}}</option>
                @endforeach
              </select>
            </td>
          </tr>

          <tr>
            <td>Порядок (приоритет)</td>
            <td><input type="number" name="order" value="1"></td>
          </tr>


        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center;">
            <button class="admin__btn" type="submit">Сохранить</button>  {{--- здесь нужно будет перекешировать --}}
        </div>
    </form>


@endsection



