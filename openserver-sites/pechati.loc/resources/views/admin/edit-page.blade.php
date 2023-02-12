@extends('layouts.admin-layout')

@section('right')
    <table class="admin__table">
        <thead>
        <tr>
            <th>Шаблон</th>
            <th>Заголовок</th>
            <th>Содержание</th>
            <th>Ссылка</th>
            <th style="text-align: center;">Опубликовано</th>
            <th>Действие</th>
        </tr>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->template }}</td>
                <td>{{ $page->meta_title }}</td>
                <td class="clip-text">{{ $page->content }}</td>
                <td>{{ $page->uri }}</td>
                <td style="text-align: center;">{{ $page->publish ? 'Да':'Нет' }}</td>
                <td><a href="{{ route('pages.edit', ['page' => $page->id]) }}">Редактировать</a></td>
            </tr>
        @endforeach
        </tbody>
        </thead>
    </table>
    <div class="admin__pagination">{{ $pages->links() }}</div>

@endsection

