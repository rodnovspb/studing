<header id="header">
    <div class="site-name"><a href="/">Блог о всяком</a></div>
    <nav class="links">
        <ul>
            @foreach($menu[0] as $item)
                <li><a href="{{ $item['url']}}">{{ $item['pagetitle'] }}</a></li>
            @endforeach
        </ul>
    </nav>
    <nav class="main">
        <ul>
            <li class="search">
                <form class="search" method="get" action="{{urlProcessor::makeUrl(15)}}">
                    <input type="text" name="search" placeholder="Search" />
                </form>
            </li>
            <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
            </li>
        </ul>
    </nav>
</header>
