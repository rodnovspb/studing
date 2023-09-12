<article class="post">
            <header>
                <div class="title">
                    <h1><a href="{{ urlProcessor::makeUrl($post['id'] ) }}">{{ $post['pagetitle'] }}</a></h1>
                    <a href="{{ urlProcessor::makeUrl($post['id'] ) }}" class="image featured"><img src="{{ $post['post_photo'] }}" alt="" /></a>
                </div>
            </header>
    {{ $post['introtext'] }}
    <footer>
        <ul class="stats">
            @isset($tags)
            @foreach ($tags as $tag)
                <li>
                    <a href="{{ urlProcessor::makeUrl($tag['id'] ) }}" class="icon solid fa-tag">{{ $tag['pagetitle']}}</a>
                </li>
            @endforeach
            @else
                <li><a href="/tags/afrika" class="icon solid fa-tag">Африка</a></li>
                <li><a href="#" class="icon solid fa-heart">28</a></li>
                <li><a href="#" class="icon solid fa-comment">128</a></li>
            @endisset
        </ul>
    </footer>
</article>
