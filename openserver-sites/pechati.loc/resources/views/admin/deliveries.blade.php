@extends('layouts.admin-layout')

@section('right')
  <table class="admin__table">
        <thead>
        <tr>
            <th>Название</th>
            <th>Изображение</th>
            <th style="text-align: center;">Опубликовано</th>
            <th style="text-align: center;">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($deliveries as $delivery)
          <tr class="admin__tr">
                <td>{{ $delivery->name }}</td>
                <td>
                  <div class="preview_img_wrapper">
                    <img class="img_file" src="{{ $delivery->src }}" alt="{{ $delivery->alt }}">
                  </div>
                </td>
                <td style="text-align: center">{{ $delivery->publish ? 'Да':'Нет' }}</td>
                <td style="text-align: center;">
                    <a class="admin__btn" href="{{ route('deliveries.edit', ['delivery' => $delivery->id]) }}">Редактировать</a>
                    <form action="{{ route('deliveries.destroy', ['delivery' => $delivery->id]) }}" method="post" style="display: inline-block;">
                      @csrf
                      @method('delete')
                      <button class="admin__btn"  type="submit">{{ $delivery->publish ? 'Снять с публикации':'Опубликовать' }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  <div class="dfc" style="margin-top: 20px;"><a class="admin__btn" href="{{ route('deliveries.create') }}">Создать</a></div>


@endsection


