@extends('layouts.admin-layout')

@section('right')
    <table class="admin__table">
        <thead>
        <tr>
            <th class="first_col">Поле</th>
            <th class="second_col">Содержание</th>
        </tr>
        </thead>

        <tbody>
          <tr>
            <td>Номер заказа</td>
            <td>{{ $order->id }}</td>
          </tr>
          <tr>
            <td>Дата</td>
            <td>{{ $order->created_at }}</td>
          </tr>
          @isset($order->page)
            <tr>
              <td>Страница</td>
              <td>{{ $order->page }}</td>
            </tr>
          @endisset
          @isset($caseSrc)
            <tr>
              <td>Оснастка</td>
              <td>
                <div class="preview_img_wrapper">
                 <img class="img_file" src="{{ $caseSrc }}" alt="">
                </div>
              </td>
            </tr>
          @endisset
          @isset($templateSrc)
            <tr>
            <td>Макет</td>
            <td>
              <div class="preview_img_wrapper">
                 <img class="img_file" src="{{ $templateSrc }}" alt="">
              </div>
            </td>
            </tr>
          @endisset
          @isset($deliveryName)
            <tr>
              <td>Доставка</td>
              <td>{{ $deliveryName }}</td>
            </tr>
          @endisset
          @isset($order->requisites__address)
            <tr>
              <td>Адрес доставки</td>
              <td>{{ $order->requisites__address }}</td>
            </tr>
          @endisset
          @isset($order->urgency)
            <tr>
              <td>Срочность</td>
              <td>{{ $order->urgency }}</td>
            </tr>
          @endisset
          @isset($order->price_hidden)
            <tr>
              <td>Стоимость</td>
              <td>{{ $order->price_hidden }}</td>
            </tr>
          @endisset
          @isset($order->requisites__inn)
            <tr>
              <td>Реквизиты</td>
              <td>{{ $order->requisites__inn }}</td>
            </tr>
          @endisset
          @isset($order->requisites__name)
            <tr>
              <td>Название</td>
              <td>{{ $order->requisites__name }}</td>
            </tr>
          @endisset
          @isset($order->requisites__contact)
            <tr>
              <td>Контакты</td>
              <td>{{ $order->requisites__contact }}</td>
            </tr>
          @endisset
          @isset($order->requisites__other)
            <tr>
              <td>Пожелания</td>
              <td>{{ $order->requisites__other }}</td>
            </tr>
          @endisset
          @isset($order->requisites__text)
          <tr>
            <td>Текст штампа</td>
            <td>{{ $order->requisites__text }}</td>
          </tr>
          @endisset
          @isset($stampSrc)
            <tr>
            <td>Штамп</td>
            <td>
              <div class="preview_img_wrapper">
                 <img class="img_file" src="{{ $stampSrc }}" alt="">
              </div>
            </td>
          </tr>
          @endisset
          @if(!$order->othergoods->isEmpty())
            <tr>
            <td>Другие товары</td>
            <td class="df" style="gap: 10px">
              @foreach($order->othergoods as $good)
                <div style="display: flex; flex-direction: column; align-items: center; gap: 3px">
                  <div class="preview_img_wrapper">
                    <img class="img_file" src="{{ $good->src }}" alt="">
                  </div>
                  <div>{{ $good->name }}</div>
                  <div>{{ $good->price }}</div>
                </div>
              @endforeach

            </td>
          </tr>
          @endif
          @if(!$order->files->isEmpty())
            <tr>
            <td>Файлы</td>
            <td>
              @foreach($order->files as $file)
                <div><a href="{{ Storage::url($file->path) }}" download="{{ $file->originalName }}">{{ $file->originalName }}</a></div>
              @endforeach
            </td>
          </tr>
          @endif





        </tbody>

    </table>
@endsection




