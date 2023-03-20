@extends('layouts.admin-layout')

@section('right')
  <form action="{{ route('deliveries.update', ['delivery' => $delivery->id]) }}" method="post" enctype="multipart/form-data">
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
              <td style="color: red; font-weight: bold;">
                Название*
              </td>
              <td>
                    <input type="text" maxlength="255" name="name" value="{{ old('name') ?? $delivery->name }}" required>
                    <span style="margin-left: 20px; color: red; font-weight: bold;">@error('name') {{ $message }} @enderror</span>
              </td>
            </tr>
            <tr>
              <td style="color: red; font-weight: bold;">
                Текст*
              </td>
              <td>
                    <input type="text" maxlength="255" name="placeholder" value="{{ old('placeholder') ?? $delivery->placeholder }}" required>
                    <span style="margin-left: 20px; color: red; font-weight: bold;">@error('placeholder') {{ $message }} @enderror</span>
              </td>
            </tr>
            <tr>
              <td style="color: red; font-weight: bold;">Изображение*</td>
              <td style="display: flex; justify-content: flex-start; align-items: center;">

              <div class="preview_img_wrapper">
                <img id="img_file" src="{{ old('src') ?? $delivery->src ?? asset('storage/images/no-photo.jpg') }}"  class="preview_img">
              </div>
              <button onclick="openPopup()" class="admin__btn" type="button">Выберите файл</button>
              <input type="text" maxlength="255" name="src" id="input_file" readonly value="{{ old('src') ?? $delivery->src ?? asset('storage/images/no-photo.jpg') }}" />
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('src') {{ $message }} @enderror</span>
              </td>
            </tr>


          <tr>
            <td>Порядок (приоритет)</td>
            <td>
              <input type="number" max="999999" step="any" name="order" value="{{ old('order') ?? $delivery->order ?? 1 }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('order') {{ $message }} @enderror</span>
            </td>
          </tr>


        <tr>
            <td>alt</td>
            <td>
              <input type="text" maxlength="255" name="alt" value="{{ old('alt') ?? $delivery->alt }}">
            </td>
          </tr>

          <tr>
            <td>title</td>
            <td>
              <input type="text" maxlength="255" name="title" value="{{ old('title') ?? $delivery->title }}">
            </td>
          </tr>

        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center; margin-bottom: 20px;">
            <button class="admin__btn" type="submit">Сохранить</button> {{--- здесь нужно будет перекешировать --}}
            <a class="admin__btn" onclick="return confirm('Удалить?')" href="{{ route('deliveries.show', ['delivery' => $delivery->id]) }}">Удалить</a>
        </div>
    </form>


@endsection





