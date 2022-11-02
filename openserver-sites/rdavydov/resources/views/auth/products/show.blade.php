@extends('auth.layouts.master')

@section('title', "Товар {$product->name}")

@section('content')
    <div class="col-md-12">
    <h1>{{ $product->name }}</h1>
    <table class="table">
       <tbody>
       <tr>
           <th>
               Поле
           </th>
           <th>
               Значение
           </th>
       </tr>
       <tr>
           <td>
               id
           </td>
           <td>
               {{ $product->id }}
           </td>
       </tr>
       <tr>
           <td>
               Код
           </td>
           <td>
               {{ $product->code }}
           </td>
       </tr>
       <tr>
           <td>
               Название
           </td>
           <td>
               {{ $product->name }}
           </td>
       </tr>
       <tr>
           <td>
               Описание
           </td>
           <td>
               {{ $product->description }}
           </td>
       </tr>
       <tr>
           <td>
               Цена
           </td>
           <td>
               {{ $product->price }}
           </td>
       </tr>
       <tr>
           <td>
               Картинка
           </td>
           <td>
               <img src="{{ Storage::url($product->image) }}" alt="" height="150px">
           </td>
       </tr>
@endsection
