@extends('layouts.admin-layout')

@section('right')
    <table class="admin__table">
        <thead>
        <tr>
            <th>Шаблон</th>
            <th>Заголовок</th>
            <th>Содержание</th>
            <th>Ссылка</th>
            <th>Опубликовано</th>
            <th>Действие</th>
        </tr>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->template }}</td>
                <td>{{ $page->meta_title }}</td>
                <td>{{ $page->content }}</td>
                <td>{{ $page->uri }}</td>
                <td>{{ $page->publish ? 'Да':'Нет' }}</td>
                <td><a href="{{ route('pages.show', ['page' => $page->id]) }}">Открыть</a></td>
            </tr>
        @endforeach
        </tbody>
    </thead>
    </table>

@endsection
