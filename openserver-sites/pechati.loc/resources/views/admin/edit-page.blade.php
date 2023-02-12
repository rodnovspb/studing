@extends('layouts.admin-layout')

@section('right')
    <table class="admin__table">
        <thead>
        <tr>
            <th>Поле</th>
            <th>Содержание</th>
        </tr>
        <tbody>

        @foreach($page as $k => $v)
            @if($k == 'template')
            <tr>
                <td>Шаблон</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'publish')
            <tr>
                <td>Опубликовано</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'top_header')
                <tr>
                <td>Верхний заголовок</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'main_header')
                <tr>
                <td>Заголовок на витрине</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'footer_header')
                <tr>
                <td>Заголовок в подвале</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'uri')
                <tr>
                <td>Ссылка</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'link_title')
                <tr>
                <td>Надпись при наведении</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'content')
                <tr>
                <td>Текст страницы</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'meta_title')
                <tr>
                <td>Заголовок браузера</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'meta_description')
            <tr>
                <td>meta_description</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'meta_keywords')
            <tr>
                <td>meta_keywords</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'top_menu_order')
            <tr>
                <td>Порядок ссылки сверху</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'main_menu_order')
            <tr>
                <td>Порядок ссылки на витрине</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'footer_menu_order')
                <tr>
                <td>Порядок ссылки в подвале</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'image_main_menu')
                <tr>
                <td>Изображение на витрине</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'image_main_title')
                <tr>
                <td>Надпись при наведении на изображение</td>
                <td>{{ $v }}</td>
            </tr>
            @elseif($k == 'image_main_alt')
                <tr>
                <td>Альт изображения</td>
                <td>{{ $v }}</td>
            </tr>
            @endif
        @endforeach
        </tbody>
        </thead>
    </table>


{{--    <button>Сохранить</button>  - здесь нужно будет перекешировать--}}

@endsection

