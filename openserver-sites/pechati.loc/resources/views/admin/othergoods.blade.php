@extends('layouts.admin-layout')

@section('right')
  <table class="admin__table">
        <thead>
        <tr>
            <th>Название</th>
            <th style="text-align: center;">Цена</th>
            <th style="text-align: center;">Изображение</th>
            <th style="text-align: center">Опубликовано</th>
            <th style="text-align: center;">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($othergoods as $good)
          <tr class="admin__tr">
                <td class="clip-text">{{ $good->name }}</td>
                <td style="text-align: center;">{{ $good->price }}</td>
                <td style="height: 100px; width: auto; display: flex; justify-content: center; align-items: center;"><img src="{{ asset('/' . $good->src) }}" alt=""></td>
                <td style="text-align: center">{{ $good->publish ? 'Да':'Нет' }}</td>
                <td style="text-align: center;">
                    <a class="admin__btn" href="{{ route('othergoods.edit', ['othergood' => $good->id]) }}">Редактировать</a>
                    <a class="admin__btn" href="{{ route('othergoods.show', ['othergood' => $good->id]) }}">{{ $good->publish == 1 ? 'Снять с публикации':'Опубликовать' }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  <div class="dfc" style="margin-top: 20px;"><a class="admin__btn" href="{{ route('othergoods.create') }}">Создать</a></div>
  <div class="admin__pagination">{{ $othergoods->links() }}</div>

@endsection

