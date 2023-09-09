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
                <a class="fa-search" href="#search">Поиск</a>
                <form id="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Найти" />
                </form>
            </li>
            <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
            </li>
        </ul>
    </nav>
</header>
