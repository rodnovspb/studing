<section id="menu">
    <!-- Search -->
    <section>
        <form class="search" method="get" action="{{urlProcessor::makeUrl(15)}}">
            <input type="text" name="search" placeholder="Search" />
        </form>
    </section>

    <!-- Links -->
    <section>
        <ul class="links">
             @foreach($menu[0] as $item)
                <li><a href="{{ $item['url']}}">{{ $item['pagetitle'] }}</a></li>
            @endforeach
        </ul>
    </section>
</section>
