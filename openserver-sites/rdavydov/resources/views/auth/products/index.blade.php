@extends('auth.layouts.master')

@section('title', 'Товары')

@section('content')
    <div class="col-md-12">
        <h1>Товары</h1>
        <table class="table">
            <tr>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Код
                </th>
                <th>
                    Название
                </th>
                <th>
                    Категория
                </th>
                <th>
                    Цена
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($products as $product)
                <td>{{ $product->id }}</td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                   <div class="btn-group" role="group">
                       <form action="{{ route('products.destroy', $product) }}" method="POST">
                           @csrf
                           <a class="btn btn-success" type="button"
                              href="{{ route('products.show', compact('product')) }}">Открыть</a>
                           <a class="btn btn-warning" type="button"
                              href="{{ route('products.edit', compact('product')) }}">Редактировать</a>
                           @method('delete')
                           <input class="btn btn-danger" type="submit" value="Удалить">
                       </form>
                   </div>
                </td>
            </tr>
            @endforeach
        </table>
        <a class="btn btn-success" href="{{ route('products.create') }}">Добавить товар</a>
@endsection
