@extends('layouts.layout')

@section('content')

    <main>
        <section class="container mx-auto text-white text-center pt-10">
        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <table class="table-auto">
                <tr>
                    <td class="px-6 text-center"><input class="text-black px-3 py-1" type="text" name="name" value="" required></td>
                    <td class="px-6 text-center"><button class="btn" type="submit">Вставить</button></td>
                </tr>
            </table>
        </form>








    </section>
</main>







@endsection

