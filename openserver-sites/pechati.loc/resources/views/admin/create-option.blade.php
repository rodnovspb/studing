@extends('layouts.admin-layout')

@section('right')
    <form action="{{ route('options.store') }}" method="post">
        @csrf
        <table class="admin__table">
        <thead>
        <tr>
            <th class="first_col">Название</th>
            <th class="second_col">Содержание</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <input class="create_input" type="text" name="name" value="{{ old('name') }}" required pattern="[a-zA-Z0-9_-]{1,255}" placeholder="Латинские буквы, тире, цифры">
                    <div style="color: red; font-weight: bold;">@error('name') {{ $message }} @enderror</div>
                </td>
                <td>
                    <textarea name="content" id="ckeditor" cols="30" rows="2" required>{{ old('content') }}</textarea>
                    <script>CKEDITOR.config.height = '100';</script>
                    <div style="color: red; font-weight: bold;">@error('content') {{ $message }} @enderror</div>
                </td>
            </tr>
        </tbody>

    </table>
        <div style="margin-top: 20px;  text-align: center;">
            <button class="admin__btn" type="submit">Сохранить</button>  {{--- здесь нужно будет перекешировать --}}
        </div>
    </form>


@endsection


