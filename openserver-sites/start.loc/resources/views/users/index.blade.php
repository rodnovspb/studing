@extends('layouts.layout')

@section('content')

    <main>
        <section class="container mx-auto text-white text-center py-10">
        <div class="alert"><?= session('success') ?? ''?></div>
        <table class="table-auto">
            <tr>
                <th class="px-6 text-center pb-3">id</th>
                <th class="px-6 text-center pb-3">Имя</th>
                <th class="px-6 text-center pb-3">Действие</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td class="px-2 pb-5 text-left">{{ $user->id }}</td>
                    <td class="px-2 pb-5 text-left">{{ $user->name }}</td>
                    <td>
                        <a class="btn" href="{{ route('users.edit', [$user->id]) }}">Редактировать</a>
                        <form class="inline" action="{{ route('users.destroy', [$user->id]) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class=" w-1/6">
            {{ $users->links() }}
        </div>
            <div class="text-left my-8"><a class="btn !px-60" href="{{ route('users.create') }}">Добавить</a></div>






    </section>
</main>







@endsection

