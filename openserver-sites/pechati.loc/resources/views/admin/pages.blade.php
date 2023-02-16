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
            <th style="text-align: center;">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr class="admin__tr">
                <td>{{ $page->template->name }}</td>
                <td>{{ $page->meta_title }}</td>
                <td class="clip-text">{{ $page->content }} </td>
                <td>{{ $page->uri }}</td>
                <td style="text-align: center;">{{ $page->publish ? 'Да':'Нет' }}</td>
                <td>
                    <a class="admin__btn" href="{{ route('pages.edit', ['page' => $page->id]) }}">Редактировать</a>
                    <form style="display: inline-block;" action="{{ route('pages.destroy', ['page' => $page->id]) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="admin__btn" {{ $page->uri === '' ? 'disabled': null }}>{{ $page->publish ? 'Снять с публикации':'Опубликовать' }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="admin__pagination">{{ $pages->links() }}</div>

@endsection
