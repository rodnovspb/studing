@extends('layouts.layout')

@section('title', 'Заказать создание сайта | Разработка сайта под ключ')

@section('keywords')Создание сайтов, заказать сайт, разработка сайтов, изготовление сайтов@endsection

@section('description')В создании сайтов самое сложное - сделать просто@endsection

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
                <li>изучаем вашу нишу</li>
                <li>находим интересные варианты</li>
                <li>совмещаем и получаем лучшее</li>
            </ul>
	    </div>
    </section>

    <section class="types">
        <div class="container">
            <h2 class="types__title">Что делаю</h2>
            <div class="types__wrapper">
                <div class="types__item item-1">
                    <div class="types__text">
                        <h3>Одностраничные сайты</h3>
                        <div class="types__desc">Представляем Вас в сети, призываем к действию</div>
                    </div>
                    <div class="types__image">
                        <img src="https://huntflow.ru/static/promo-static/landing-2021/src/images/blocks/demo-request/image.svg" alt="">
                    </div>
                </div>
                <div class="types__item item-2">
                    <div class="types__text">
                        <h3>Интернет-магазины</h3>
                        <div class="types__desc">Простые, понятные, удобные покупки</div>
                    </div>
                    <div class="types__image">
                        <img src="https://huntflow.ru/static/promo-static/landing-2021/src/images/blocks/demo-request/image.svg" alt="">
                    </div>
                </div>
                <div class="types__item item-3">
                    <div class="types__text">
                        <h3>Многостраничные сайты</h3>
                        <div class="types__desc">Чтобы два раза не бегать</div>
                    </div>
                    <div class="types__image">
                        <img src="https://huntflow.ru/static/promo-static/landing-2021/src/images/blocks/demo-request/image.svg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="result">
        <div class="container">
            <h2 class="result__title">Что будет</h2>
            <div class="result__wrapper">

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
