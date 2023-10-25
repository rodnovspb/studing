@extends('layouts.layout')

@section('title', 'Соционический тест Вайсбанда на 4 вопроса')
@section('description', 'Соционический тест Вайсбанда 4 вопроса')
@section('keywords', 'Соционический тест Вайсбанда')

@section('content')


    <section class="test">
    <div class="container">
        <div class="test__wrapper">
        <h1 class="test__title">Тест Вайсбанда</h1>
        <div class="test__choose_title">В каждой паре выберите ту часть, которая в наибольшей степени соответствует вашему духовному складу.</div>
        <div class="test__block">
            <h3 class="test__ques_num">Вопрос №<span>1</span> из 4</h3>
            <div class="test__questions">
                <button class="test__item" data-number="1">Импровизация; свобода от обязательств; действия по ситуации; гибкая воля; реальность, а не догмы; работа по вдохновению; поиск; использовать шанс; приспособление к меняющемуся миру; уловить ситуацию и тенденции; импульсивные поступки, эмоции, решения; удовольствия от начинаний.</button>
                <button class="test__item" data-number="2">Планомерное продвижение; заблаговременная подготовка; системная работа; не отложить на последнюю минуту; довести начатое до конца; сделать и полюбоваться результатом; решительность; устойчивость мнений; правильные поступки, эмоции и решения; удовольствие от завершения.</button>
            </div>
            <div class="test__questions dn">
                <button class="test__item" data-number="3">Абстракция; теория; интересные задачи; понять суть, смысл вещей, перспектив; уступить в мелочах; весь мир — в будущем.</button>
                <button class="test__item" data-number="4">Конкретная практика; полезные дела; понять расстановку сил, влияний; добиться своего; моя жизнь — сегодня.</button>
                <button class="test__item" data-number="5">Рассудок; холодный анализ; логика; объективный подход; трезвое мышление; непредвзятость; сдержанность.</button>
                <button class="test__item" data-number="6">Чувства, эмоции; сопереживание людям; симпатии, антипатии; любовь и ненависть; неравнодушие; сердечность.</button>
            </div>
            <div class="test__questions dn">
                <button class="test__item" data-number="7">Азарт открытия; увлечение людьми и начинаниями.</button>
                <button class="test__item" data-number="8">Интуиция; духовность; самопознание; время и история.</button>
                <button class="test__item" data-number="9">Воля; преодоление трудностей; сила и красота.</button>
                <button class="test__item" data-number="10">Ощущение момента; интересы близких; эстетика.</button>
                <button class="test__item" data-number="11">Правильные действия; логика поступков; мое право.</button>
                <button class="test__item" data-number="12">Спокойное мышление; логика отношений; мое место.</button>
                <button class="test__item" data-number="13">Эмоциональная открытость; порыв любви, гнева.</button>
                <button class="test__item" data-number="14">Скрытый мир чувств; добро и зло; приязнь, осуждение.</button>
            </div>
            <div class="test__questions dn">
                <button class="test__item" data-number="15">Драматизм, трагедия; сопереживание.</button>
                <button class="test__item" data-number="16">Радость, эмоции, праздник; доброе настроение.</button>
                <button class="test__item" data-number="17">Вера, надежда, любовь; преданность близким.</button>
                <button class="test__item" data-number="18">Неприятие зла; воля к моральной чистоте.</button>
                <button class="test__item" data-number="19">Равенство, справедливость; система знаний.</button>
                <button class="test__item" data-number="20">Логика системы; волевое внедрение.</button>
                <button class="test__item" data-number="21">Я все делаю быстро, эффективно, с пользой.</button>
                <button class="test__item" data-number="22">Добросовестность дел; надежность, качество.</button>
                <button class="test__item" data-number="23">Кто хочет — тот добьется; логика борьбы.</button>
                <button class="test__item" data-number="24">Энергия; влияние на людей, на их чувства.</button>
                <button class="test__item" data-number="25">Условия жизни; умелые руки; независимость.</button>
                <button class="test__item" data-number="26">Ощущения, природа; теплое общение и эмоции.</button>
                <button class="test__item" data-number="27">Скептическое предвидение; профессионализм.</button>
                <button class="test__item" data-number="28">Эмоциональное предчувствие; поэтичность.</button>
                <button class="test__item" data-number="29">Вдохновляющие идеи; начинания и теории.</button>
                <button class="test__item" data-number="30">Интересные, талантливые люди, общение.</button>
            </div>
            <button class="test__arrow_back">❮</button>
        </div>
         </div>
    </div>
</section>

@endsection

@push('script')
    <script>
        ;(function (){
            let result = [];
            let count = 1;
            let buttons = document.querySelectorAll('.test__item')
            let quesNumber = document.querySelector('.test__ques_num span')
            if( !buttons || !buttons.length > 0) return false

            let quustions = {
                0: [1,2],
                1: [3,4],
                2: [5,6],
                3: [7,8],
                4: [9,10],
                5: [11,12],
                6: [13,14],
                7: [29,30],
                8: [27,28],
                9: [23,24],
                10: [25,26],
                11: [21,22],
                12: [19,20],
                13: [15,16],
                14: [17,18]
            }

            buttons.forEach(elem => {
                elem.addEventListener('click', function (e) {
                    count ++;
                    let parentNode = elem.closest('.test__questions')
                    parentNode.querySelectorAll('.test__item').forEach(elem => elem.classList.remove('active'))
                    elem.classList.add('active')
                    if(count < 5){
                        parentNode.classList.add('dn')
                    }
                    showQuestion(count, elem.dataset.number)
                })
            })

            document.querySelector('.test__arrow_back').addEventListener('click', ()=>{
                count --;
                if(count >= 1){
                    let blocks = document.querySelectorAll('.test__questions')
                    blocks.forEach(elem => {
                        elem.classList.add('dn')
                    })
                    document.querySelectorAll('.test__questions')[count-1].classList.remove('dn')
                } else {
                    count = 1
                }
            })


            function showQuestion(num, activeElemNumber){
                if(num < 5){
                    let blocks = document.querySelectorAll('.test__questions')
                    blocks.forEach(elem => {
                        elem.classList.add('dn')
                    })
                    let targetBlock = blocks[num - 1]
                    if(typeof(targetBlock) != 'undefined' && targetBlock != null){
                        targetBlock.classList.remove('dn')
                        targetBlock.querySelectorAll('.test__item').forEach(elem => {
                            elem.classList.add('dn')
                            if(quustions[activeElemNumber].includes(Number(elem.dataset.number))){
                                elem.classList.remove('dn')
                            }
                        })
                        quesNumber.textContent = count
                    }
                } else {
                    getType()
                }

            }


            function getType(){
                document.querySelectorAll('.test__item.active').forEach(elem => {
                    result.push(elem.dataset.number)
                })
                if(result.length === 4){
                    let res = getNumberOfType(result)
                    fetch('{{ route('get_test_result') }}', {
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ res: res })
                    })
                        .then(res=>res.json())
                        .then(res=>showText(res))
                        .catch(e=>console.log(e))

                }

            }

            function getNumberOfType(arr){
                for(let num in sociotypes){
                    if(arr.sort().join('') === sociotypes[num].sort().join('')){
                        return num;
                    }
                }
                return false
            }

            function showText(res){
                document.querySelector('.test__wrapper').innerHTML = `
                    <h1 class="test__title">Ваш социотип ${res['name']}</h1>
                    <div class="test__description">${res['description']}</div>
                    <div class="test__description test__annotation">По тесту сразу определить социотип сложно. Кроме того описание примерное, обобщенное. Если оно совсем не подходит пройдите тест еще раз, либо пройдите <a href="{{route('tests')}}#tests">другой тест</a>. Также можно записаться на <a href="{{route('tipirovanie')}}">типирование</a>.</div>
                    <div class="test__refresh"><a href="{{ route('vaisband') }}">Пройти заново</a></div>`
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }


            let sociotypes = {
                1: [1,3,7,29], //дон
                2: [1,4,10,26], //дюма
                3: [2,6,13,16], //гюго
                4: [2,5,12,19], //роб
                5: [2,6,13,15], //гам
                6: [2,5,12,20], //макс
                7: [1,4,9,23], //жук
                8: [1,3,8,28], //есен
                9: [1,4,9,24], //нап
                10: [1,3,8,27], //баль
                11: [2,5,11,21], //джек
                12: [2,6,14,18], //драй
                13: [2,5,11,22], //штир
                14: [2,6,14,17], //дост
                15: [1,3,7,30], //гек
                16: [1,4,10,25] //габ
            }


        })()



    </script>
@endpush
















