@extends('layouts.admin-layout')

@section('right')
  <table class="admin__table">
        <thead>
        <tr>
            <th style="text-align: center">Номер заказа</th>
            <th style="text-align: center;">Страница</th>
            <th style="text-align: center;">Заказ</th>
            <th style="text-align: center">Дата</th>
            <th style="text-align: center;">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
          <tr>
                <td style="text-align: center">{{ $order->id }}</td>
                <td style="text-align: center">{{ $order->page }}</td>
                <td style="text-align: center">{{ $order->requisites__name ?? $order->requisites__contact ?? $order->requisites__other ?? null }}</td>
                <td style="text-align: center">{{ $order->created_at }}</td>
                <td style="text-align: center">
                    <a class="admin__btn" href="{{ route('orders.show', ['order' => $order->id]) }}">Открыть</a>
                    <form style="display: inline-block;" action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button class="admin__btn" onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
  <div class="admin__pagination">{{ $orders->links() }}</div>
  <form action="{{ route('search_order') }}" method="get">
    @csrf
    <input type="search" name="s" class="input">
    <button class="admin__btn">Найти заказ</button>
  </form>


@endsection













