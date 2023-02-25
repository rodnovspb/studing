<header class="header__admin">
        <h1>Административная панель</h1>
    </header>
    <main class="main main-admin">

              <section class="admin">
                  <div class="admin__left">
                      <ul class="admin__list">
                          <li><a href="{{ route('index') }}" target="_blank">На сайт</a></li>
                          <li><a href="{{ route('orders.index') }}">Список заказов</a></li>
                          <li><a href="{{ route('pages.index') }}">Страницы сайта</a></li>
                          <li><a href="{{ route('file-manager') }}">Файловый менеджер</a></li>
                          <li><a href="{{ route('options.index') }}">Настройки</a></li>
                      </ul>
                  </div>
                  <div class="admin__right">
                        @yield('right', null)
                  </div>

              </section>
    </main>


