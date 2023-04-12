@extends('layouts.admin-layout')

@section('right')
    <table class="admin__table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Содержание</th>
            <th style="text-align: center;">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($options as $option)
            <tr class="admin__tr">
                <td>{{ $option->name }}</td>
                <td class="clip-text">{{ $option->content }}</td>
                <td style="text-align: center;">
                    <a class="admin__btn" href="{{ route('options.edit', ['option' => $option->id]) }}">Редактировать</a>
                    <form action="{{ route('options.destroy', ['option' => $option->id]) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <button class="admin__btn" onclick="return confirm('Удалить?')" type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="dfc" style="margin-top: 20px;"><a class="admin__btn" href="{{ route('options.create') }}">Создать константу</a></div>
    <div class="admin__pagination">{{ $options->links() }}</div>

@endsection

