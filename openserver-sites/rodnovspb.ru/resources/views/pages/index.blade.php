@extends('layouts.layout')

@section('title', 'Создание сайтов. Заказать разработку сайта. Стоимость')

@section('keywords')сайт, создание, разработка, заказать, стоимость, цена, под ключ, изготовление@endsection

@section('description')У нас вы можете купить сайт или заказать создание сайта под ключ. Сложное делаем простым@endsection

@section('content')
    <section class="creating">
        <div class="container">
            <h1 class="creating__title">Создание сайтов</h1>
            <div class="creating__subtitle">cложное делаю
                <div class="creating__subtitle-wrapper">
                    <span class="creating__span"></span><span class="creating__cursor">|</span>
                </div>
            </div>
            <ul class="creating__steps">
                <li >
                    <svg>
                        <use href="{{ asset('storage/images/sprite.svg#search') }}"></use>
                        <title>Перед созданием сайта изучаем нишу</title>
                    </svg>
                    изучаем вашу нишу
                </li>
                <li class="creating__interest">
                    <svg>
                        <title>Находим интересные сайты</title>
                        <use href="{{ asset('storage/images/sprite.svg#lamp') }}"></use>
                    </svg>
                    находим интересные варианты
                </li>
                <li>
                    <svg>
                        <title>Разрабатываем лучший сайт</title>
                        <use href="{{ asset('storage/images/sprite.svg#best') }}"></use>
                    </svg>
                    совмещаем и получаем лучшее
                </li>
            </ul>
	    </div>
    </section>

    <section class="types">
        <div class="container">
            <h2 class="types__title title">Что делаю</h2>
            <div class="types__wrapper">
                <div class="types__item item-1 smooth">
                    <div class="types__text">
                        <h3>Одностраничные сайты</h3>
                        <div class="types__desc">Знакомим, призываем к действию</div>
                    </div>
                    <div class="types__image">
                        <img src="{{ asset('storage/images/odnostranichnye-sajty.svg') }}" alt="создать одностраничный сайт-лендинг" title="Заказать или купить сайт-одностраничник">
                    </div>
                </div>
                <div class="types__item item-2 smooth">
                    <div class="types__text">
                        <h3>Интернет-магазины</h3>
                        <div class="types__desc">Простые и удобные покупки</div>
                    </div>
                    <div class="types__image">
                        <img src="{{ asset('storage/images/internet-magaziny-sajty.svg') }}" alt="создать сайт интернет-магазин" title="Заказать или купить интернет-магазин">
                    </div>
                </div>
                <div class="types__item item-3 smooth">
                    <div class="types__text">
                        <h3>Многостраничные сайты</h3>
                        <div class="types__desc">Сайты различного назначения</div>
                    </div>
                    <div class="types__image">
                        <img src="{{ asset('storage/images/mnogostranichnye-sajty.svg') }}" alt="создать многостраничный сайт" title="Заказать или купить другой сайт">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="result">
        <div class="container">
            <h2 class="result__title title">Что будет</h2>
            <div class="result__wrapper">
                <ul class="result__list">
                    <li class="smooth">Верстка под все размеры экранов</li>
                    <li class="smooth">Оптимизация под поисковые системы</li>
                    <li class="smooth">Чат с посетителями сайта</li>
                    <li class="smooth">Яндекс метрика (статистика посещаемости)</li>
                    <li class="smooth">По необходимости реклама в Я.Директ</li>
            </ul>
            </div>
        </div>
    </section>

    <section class="questions">
        <div class="container">
            <h2 class="questions__title title">Ответы</h2>
            <div class="questions__wrapper">

                <dl class="questions__item smooth">
                    <div class="questions__top">
                        <svg class="questions__img">
                            <title>Сроки создания сайта сайта</title>
                            <use href="{{ asset('storage/images/sprite.svg#time') }}"></use>
                        </svg>
                        <dt class="questions__question">Какие сроки?</dt>
                        <div class="questions__toggle">
                        </div>
                    </div>
                    <dd class="questions__bottom">
                        В зависимости от сложности сайта и загруженности на момент заказа. Создание простых сайтов - от 2 недель. Разработка сложных сайтов - от месяца. Также у нас можно купить готовые сайты - быстро, недорого, по готовому шаблону, с самостоятельным заполнением.
                    </dd>
                </dl>

                <dl class="questions__item smooth">
                    <div class="questions__top">
                        <svg class="questions__img">
                            <title>Стоимость заказа сайта</title>
                            <use href="{{ asset('storage/images/sprite.svg#payment') }}"></use>
                        </svg>
                        <dt class="questions__question">Стоимость и порядок оплаты</dt>
                        <div class="questions__toggle">
                        </div>
                    </div>
                    <dd class="questions__bottom">
                        Стоимость сайта в зависимости от сложности. Самые простые сайты - от 15000 руб. Перед началом работ понадобится предоплата 50%. Оплата на счет ИП УСН 6% или переводом на карту.
                    </dd>
                </dl>

                <dl class="questions__item smooth">
                    <div class="questions__top">
                        <svg class="questions__img">
                            <title>Этапы разработки сайта</title>
                            <use href="{{ asset('storage/images/sprite.svg#stages') }}"></use>
                        </svg>
                        <dt class="questions__question">Этапы работ</dt>
                        <div class="questions__toggle">
                        </div>
                    </div>
                    <dd class="questions__bottom">
                        <ul class="questions__stages">
                            <li><span>Определяем задачи сайта, основной функционал, работы</span></li>
                            <li><span>Называем стоимость. Предоплата 50%</span></li>
                            <li><span>Изучаем нишу и подбираем варианты решения</span></li>
                            <li><span>Согласовываем прототип, начинаем создание сайта</span></li>
                            <li><span>Дизайн, верстка, программирование</span></li>
                            <li><span>Окончательный расчет и выкладка сайта на хостинг</span></li>
                        </ul>
                    </dd>
                </dl>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        ;(function (){
            let span = document.querySelector('.creating__span')
            let cursor = document.querySelector('.creating__cursor')
            let texts = ['простым', 'понятным', 'удобным']
            let countWord = 0;
            let countLetter = 0;
            let increase = true;

            function addLetter(){
                cursor.classList.add('blink')
                setTimeout(()=>{
                    cursor.classList.remove('blink')
                    let word = texts[countWord]
                    let timerIncrease = setInterval(()=>{
                        if(span.textContent.length !== word.length){
                            span.textContent += word[countLetter++]
                        } else {
                            countLetter = 0
                            countWord++
                            if(countWord === texts.length){
                                countWord = 0
                            }
                            clearInterval(timerIncrease)
                            cursor.classList.add('blink')
                            setTimeout(()=>{
                                deleteLetter(span)
                            }, 1000)

                        }
                    }, 650)
                }, 1200)

            }

            function deleteLetter(text){
                cursor.classList.remove('blink')
                let length = text.textContent.length
                let timerDecrease = setInterval(()=>{
                    if(text.textContent.length !== 0){
                        text.textContent = text.textContent.substring(0, length--)
                    } else {
                        clearInterval(timerDecrease)
                        addLetter()
                    }
                }, 100)
            }

            addLetter()



        })();
    </script>

@endpush
