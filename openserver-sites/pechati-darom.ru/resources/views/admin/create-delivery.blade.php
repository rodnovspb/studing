@extends('layouts.admin-layout')

@section('right')
  <form action="{{ route('deliveries.store') }}" method="post" enctype="multipart/form-data">
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
              <td style="color: red; font-weight: bold;">
                Название*
              </td>
              <td>
                    <input type="text" maxlength="255" name="name" value="{{ old('name') ?? null }}" required>
                    <span style="margin-left: 20px; color: red; font-weight: bold;">@error('name') {{ $message }} @enderror</span>
              </td>
            </tr>
            <tr>
              <td style="color: red; font-weight: bold;">
                Текст*
              </td>
              <td>
                    <input type="text" maxlength="255" name="placeholder" value="{{ old('placeholder') ?? null }}" required>
                    <span style="margin-left: 20px; color: red; font-weight: bold;">@error('placeholder') {{ $message }} @enderror</span>
              </td>
            </tr>
            <tr>
              <td style="color: red; font-weight: bold;">Изображение*</td>
              <td style="display: flex; justify-content: flex-start; align-items: center;">

              <div class="preview_img_wrapper">
                <img id="img_file" src="{{ old('src') ?? asset('storage/images/no-photo.jpg') }}" alt="" class="preview_img">
              </div>
              <button onclick="openPopup()" class="admin__btn" type="button">Выберите файл</button>
              <input type="text" maxlength="255" name="src" id="input_file" readonly value="{{ old('src') ?? null }}" />
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('src') {{ $message }} @enderror</span>
              </td>
            </tr>


          <tr>
            <td>Порядок (приоритет)</td>
            <td>
              <input type="number" step="any" max="999999" name="order" value="{{ old('order') ?? 1 }}">
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('order') {{ $message }} @enderror</span>
            </td>
          </tr>


        <tr>
            <td>alt</td>
            <td>
              <input type="text" maxlength="255" name="alt" value="{{ old('alt') ?? null }}">
            </td>
          </tr>

          <tr>
            <td>title</td>
            <td>
              <input type="text" maxlength="255" name="title" value="{{ old('title') ?? null }}">
            </td>
          </tr>

        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center; margin-bottom: 20px;">
            <button class="admin__btn" type="submit">Сохранить</button> {{--- здесь нужно будет перекешировать --}}
        </div>
    </form>


@endsection




