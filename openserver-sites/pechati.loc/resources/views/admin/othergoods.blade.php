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
                <td style="width: auto; display: flex; justify-content: center; align-items: center;">
                  <div class="preview_img_wrapper">
                    <img id="img_file" src="{{ $good->src }}" alt="{{ $good->alt }}" title="{{ $good->title }}">
                  </div>
                </td>
                <td style="text-align: center">{{ $good->publish ? 'Да':'Нет' }}</td>
                <td style="text-align: center;">
                    <a class="admin__btn" href="{{ route('othergoods.edit', ['othergood' => $good->id]) }}">Редактировать</a>
                    <form action="{{ route('othergoods.destroy', ['othergood' => $good->id]) }}" method="post" style="display: inline-block;">
                      @csrf
                      @method('delete')
                      <button class="admin__btn"  type="submit">{{ $good->publish ? 'Снять с публикации':'Опубликовать' }}</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  <div class="dfc" style="margin-top: 20px;"><a class="admin__btn" href="{{ route('othergoods.create') }}">Создать</a></div>
  <div class="admin__pagination">{{ $othergoods->links() }}</div>

@endsection

