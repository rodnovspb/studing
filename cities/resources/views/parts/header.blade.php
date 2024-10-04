<header class="header">
    <div class="container">
        <div class="header__block">
            <div class="current__city">Выбран город: {{ $city }}</div>
            <ul class="pages">
                <li><a href="{{ route('index') }}">Главная</a></li>
                <li><a href="{{ route('about') }}">О нас</a></li>
                <li><a href="{{ route('news') }}">Новости</a></li>
            </ul>
        </div>
    </div>
</header>
