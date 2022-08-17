<div class="btn-group mb-4" role="group" aria-label="Basic outlined example">
        @foreach($categories as $category)
        <a href="{{ route('getPostsByCat', $category->slug)  }}" class="btn btn-outline-primary">{{ $category->title  }}</a>
        @endforeach
</div>
