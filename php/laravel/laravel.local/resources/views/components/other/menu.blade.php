
<div>
    <ul class="{{ $class }}" id="{{ $id }}">
    @foreach($categories as $category)
        <li><a href="{{ $category->slug }}">{{ $category->name }}</a></li>
    @endforeach
    </ul>
    <ul>
        @foreach($posts as $post)
            <li><a href="{{ $post->slug }}">{{ $post->title }}</a> {{ $post->likes }}</li>
        @endforeach
    </ul>

</div>


