@extends('auth.layouts.master')

    @isset($property)
        @section('title', 'Редактировать свойство ' . $property->name)
    @else
        @section('title', 'Добавить свойства')
    @endisset

@section('content')
    <div class="col-md-12">
        @isset($property)
            <h1>Редактировать свойство <b>{{ $property->name }}</b></h1>
        @else
            <h1>Добавить свойство</h1>
        @endisset

        <form method="post"
        @isset($property)
                action="{{ route('properties.update', $property) }}"
        @else
                action="{{ route('properties.store') }}"
        @endisset >
            <div>
                @isset($property)
                    @method('put')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($property) {{ $property->name }}  @endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name_en" class="col-sm-2 col-form-label">Название на англ.: </label>
                    <div class="col-sm-6">
                        @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control" name="name_en" id="name_en"
                               value="@isset($property) {{ $property->name_en }}  @endisset">
                    </div>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
