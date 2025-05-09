@extends('layouts.admin-layout')

@section('right')
    <form action="{{ route('pages.update', ['page' => $page->id]) }}" method="post">
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
                <td>Шаблон</td>
                <td>
                    <select name="template_id">
                        @foreach($templates as $template)
                            <option value="{{ $template->id }}" @if($page->template_id === $template->id ) selected @endif>{{ $template->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>Опубликовано</td>
                <td>
                    <select name="publish">
                        <option value="0" @if(!empty(old('publish')) && old('publish') == 0 || $page->publish == 0) selected @endif>Нет</option>
                        <option value="1" @if(!empty(old('publish')) && old('publish') == 1 || $page->publish == 1) selected @endif>Да</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="color: red; font-weight: bold;">Заголовок браузера*</td>
                <td>
                    <input type="text" maxlength="255" name="meta_title" required value="{{ $page->meta_title }}">
                    <span style="margin-left: 20px; color: red; font-weight: bold;">@error('meta_title') {{ $message }} @enderror</span>
                </td>
            </tr>

            <tr>
                <td>Заголовок в шапке</td>
                <td><input type="text" maxlength="255" name="top_header" value="{{ old('top_header') ?? $page->top_header }}"/></td>
            </tr>

            <tr>
                <td>Порядок ссылки в шапке (0 - не показывать)</td>
                <td>
                  <input type="number" max="999999" step="any" name="top_menu_order" value="{{ old('top_menu_order') ?? $page->top_menu_order }}">
                  <span style="margin-left: 20px; color: red; font-weight: bold;">@error('top_menu_order') {{ $message }} @enderror</span>
                </td>
            </tr>

            <tr>
                <td>Заголовок на витрине</td>
                <td><input type="text" maxlength="255" name="main_header" value="{{ old('main_header') ?? $page->main_header }}"></td>
            </tr>

            <tr>
                <td>Порядок ссылки на витрине (0 - не показывать)</td>
                <td>
                  <input type="number" max="999999" step="any" name="main_menu_order" value="{{ old('main_menu_order') ?? $page->main_menu_order }}">
                  <span style="margin-left: 20px; color: red; font-weight: bold;">@error('main_menu_order') {{ $message }} @enderror</span>
                </td>
            </tr>

             <tr>
                <td>Заголовок в подвале</td>
                <td><input type="text" maxlength="255" name="footer_header" value="{{ old('footer_header') ?? $page->footer_header }}"></td>
            </tr>

            <tr>
                <td>Порядок ссылки в подвале (0 - не показывать)</td>
                <td>
                  <input type="number" max="999999" step="any" name="footer_menu_order" value="{{ old('footer_menu_order') ?? $page->footer_menu_order }}">
                  <span style="margin-left: 20px; color: red; font-weight: bold;">@error('footer_menu_order') {{ $message }} @enderror</span>
                </td>
            </tr>

            {{--чтобы не могли редактировать ссылки магазина, так как через них подключаются формы--}}
            @if($page->template_id !== 5)
            <tr>
                <td>Ссылка (писать латиницей)</td>
                <td>
                    <input type="text" maxlength="255" name="uri" value="{{ old('uri') ?? $page->uri }}"  pattern="[a-z0-9-]{2,1000}" @if($page->uri === null) disabled @endif>
                    <span style="margin-left: 20px; color: red; font-weight: bold;">@error('uri') {{ $message }} @enderror</span>
                </td>
            </tr>
            @endif

            <tr>
                <td>Надпись при наведении</td>
                <td><input type="text" maxlength="255" name="link_title" value="{{ old('link_title') ?? $page->link_title }}"></td>
            </tr>

            <tr>
                <td>Текст страницы</td>
                <td><textarea name="content" id="ckeditor" cols="30" rows="10">{{ old('content') ?? $page->content }}</textarea></td>
            </tr>

            <tr>
                <td>meta_description</td>
                <td><input type="text" maxlength="255" name="meta_description" value="{{ old('meta_description') ?? $page->meta_description }}"></td>
            </tr>

            <tr>
                <td>meta_keywords</td>
                <td><input type="text" maxlength="255" name="meta_keywords" value="{{ old('meta_keywords') ?? $page->meta_keywords }}"></td>
            </tr>

            <tr>
              <td style="color: red; font-weight: bold;">Изображение на витрине</td>
              <td style="display: flex; justify-content: flex-start; align-items: center;">

              <div class="preview_img_wrapper">
                <img id="img_file" src="{{ old('image_main_menu') ?? $page->image_main_menu ?? asset('storage/images/no-photo.jpg') }}"  class="preview_img">
              </div>
              <button onclick="openPopup()" class="admin__btn" type="button">Выберите файл</button>
              <input type="text" maxlength="255" name="image_main_menu" id="input_file" readonly value="{{ old('image_main_menu') ?? $page->image_main_menu ?? asset('storage/images/no-photo.jpg') }}" />
              <span style="margin-left: 20px; color: red; font-weight: bold;">@error('image_main_menu') {{ $message }} @enderror</span>
              </td>
            </tr>

            <tr>
                <td>Надпись при наведении на изображение</td>
                <td><input type="text" maxlength="255" name="image_main_title" value="{{ old('image_main_title') ?? $page->image_main_title }}"></td>
            </tr>

            <tr>
                <td>Альт изображения</td>
                <td><input type="text" maxlength="255" name="image_main_alt" value="{{ old('image_main_alt') ?? $page->image_main_alt }}"></td>
            </tr>

        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center;">
            <button class="admin__btn" type="submit" style="margin-right: 20px;">Сохранить</button>  {{--- здесь нужно будет перекешировать --}}
            <a class="admin__btn" onclick="return confirm('Удалить?')" href="{{ route('pages.show', ['page' => $page->id]) }}">Удалить страницу</a>
        </div>
    </form>


@endsection

