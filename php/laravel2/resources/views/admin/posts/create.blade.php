@extends('layout.admin')
@section('title',  isset($post) ? "Редактировать статью ID {$post->id}" : 'Добавить статью')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($post) ? "Редактировать статью ID {$post->id}" : 'Добавить статью' }}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="post" action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif
                <input name="title" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-800 @enderror" placeholder="Название" value="{{ isset($post) ? $post->title : '' }}"/>
                @error('title')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="preview" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('preview') border-red-800 @enderror" placeholder="Кратко" value="{{ isset($post) ? $post->preview : '' }}"/>
                @error('preview')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('description') border-red-800 @enderror" placeholder="Описание" value="{{ isset($post) ? $post->description : '' }}"/>
                @error('description')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                @if(isset($post) && $post->thumbnail)
                    <div>
                        <img class="h-64 w-64"
                             src="/storage/posts/{{ $post->thumbnail }}">
                    </div>
                @endif

                <input name="thumbnail" type="file" class="w-full h-12" placeholder="Обложка"/>
                @error('thumbnail')
                <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
