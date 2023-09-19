@php use EvolutionCMS\UrlProcessor; @endphp
<!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="index.html"><img src="/template/img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
</div>

<header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="index.html"><img src="/template/img/core-img/logo.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
            <nav class="amado-nav">
                {!! $modx->runSnippet('DLMenu', [
                    'parents' => 0,
                    'maxDepth' => 1,
                    'outerTpl' => '@CODE:<ul[+classes+]>[+wrap+]</ul>',
                    'rowTpl' => '@CODE:<li[+classes+]><a href="[+url+]">[+title+]</a></li>',
                    'hereClass' => 'active',
                    'activeClass' => 'active'
                ]) !!}
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                @guest
                    <a href="/login" class="btn amado-btn mb-15">Вход</a>
                @else
                    не гость
                @endguest

                <a href="/register" class="btn amado-btn active">Регистрация</a>
            </div>

            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <a href="cart.html" class="cart-nav"><img src="/template/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
                <a href="#" class="fav-nav"><img src="/template/img/core-img/favorites.png" alt=""> Favourite</a>
                <a href="#" class="search-nav"><img src="/template/img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
