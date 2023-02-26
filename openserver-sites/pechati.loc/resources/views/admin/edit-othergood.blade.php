@extends('layouts.admin-layout')

@section('right')

  <form action="{{ route('othergoods.update', ['othergood' => $good->id]) }}" method="post" enctype="multipart/form-data">
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
            <td style="color: red; font-weight: bold;">Название - обязательное поле</td>
            <td>
              <input type="text" name="name" required value="{{ old('name') ?? $good->name }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('name') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Цена</td>
            <td>
              <input type="number" name="price" value="{{ old('price') ?? $good->price }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('price') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>Изображение</td>
            <td style="height: 100px; width: auto; display: flex; justify-content: flex-start; align-items: center;">
              <img src="{{ asset('/' . $good->src) }}" alt="" style="margin-right: 30px;">
              <input  type="file" name="src" accept="image/*">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('src') {{ $message }} @enderror</span>
            </td>
          </tr>

          <tr>
            <td>alt</td>
            <td>
              <input type="text" name="alt" value="{{ old('alt') ?? $good->alt }}">
            </td>
          </tr>

          <tr>
            <td>title</td>
            <td>
              <input type="text" name="title" value="{{ old('title') ?? $good->title }}">
            </td>
          </tr>

          <tr>
            <td>Страницы показа <span class="help" title="если не выберете, то будет показываться на всех страницах | чтобы отменить выделение зажмите Ctrl">?</span><br> (выделение нескольких через Ctrl)</td>
            <td>
              <select name="pages_for_othergoods[]" multiple style="height: 200px;">
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
              <input type="number" name="order" value="{{ old('order') ?? $good->order }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('order') {{ $message }} @enderror</span>
            </td>
          </tr>

        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center;">
            <button class="admin__btn" type="submit">Сохранить</button>  {{--- здесь нужно будет перекешировать--}}
        </div>
    </form>

{{--  <form action="{{ route('othergoods.destroy', ['othergood' => $good->id]) }}" method="post" style="display: inline-block;">--}}
{{--  @csrf--}}
{{--    @method('delete')--}}
{{--    <button class="admin__btn" onclick="return confirm('Удалить?')" type="submit">Удалить</button>--}}
{{--  </form>--}}
@endsection



