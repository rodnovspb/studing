@extends('layouts.layout')

@section('title', 'Тест по соционике Мегедь-Овчарова на 4 вопроса')
@section('description', 'Тест по соционике Мегедь-Овчарова 4 вопроса')
@section('keywords', 'Тест, Мегедь-Овчарова, соционика')

@section('content')


<section class="test">

<div class="text">
  <h1>Соционический тест Мегедь-Овчарова</h1>
  <div class="test__choose_title">Выберите более подходящее для себя утверждение:</div>
  <div class="test__block">
      <h3 class="test__ques_num">Вопрос №<span>1</span> из 4</h3>
      <div class="test__questions">
          <button class="test__item" data-number="1">Вам нравятся ясность и определенность во всем, поэтому вы не склонны менять свои планы, убеждения и привычки. Неопределенность и многовариативность возможных решений вас раздражает. Вы не любите ничего откладывать "на потом", умеете равномерно распределять нагрузку и укладываться в заранее намеченные сроки. Предпочитаете иметь четко обозначенные задачи и конкретный временной график работы.</button>
          <button class="test__item" data-number="2">Вы не составляете четких планов на будущее, так как любите действовать без подготовки, по ситуации, рассчитывая на находчивость и везение. Вас не очень тяготит неопределенность, вы любите иметь в запасе несколько возможных вариантов решения проблемы. Вы легко переключаетесь с одного дела на другое, охотно пересматриваете прежние взгляды и решения. Вам трудно укладываться в сроки, подчиняться строгому графику или распорядку.</button>
      </div>
      <div class="test__questions dn">
          <button class="test__item" data-number="3">В своих решениях вы, прежде всего, опираетесь на факты и здравый смысл, не ставя их в зависимость от ваших чувств и отношений с окружающими. Умеете логично обосновывать свою точку зрения, руководствуясь аргументами и доказательствами, а не личными переживаниями. Считаете, что важнее быть правым, чем приятным. Не делаете незаслуженных комплиментов. Не любите обсуждать темы личной жизни других людей.</button>
          <button class="test__item" data-number="4">Вас глубоко интересуют темы, связанные с чувствами и отношениями между людьми. Вы охотно участвуете в обсуждении и решении их личных проблем, стараетесь улучшить взаимопонимание, так как не выносите разногласий и обид в своем окружении. Вам нравится делать другим комплименты, создавать теплую и приятную атмосферу общения. Вам трудно объективно оценивать тех, кому вы симпатизируете и тех, кто вам неприятен. Вы можете ставить личные отношения выше деловых.</button>
      </div>
      <div class="test__questions dn">
          <button class="test__item" data-number="5">Вы - реалист и практик, любите больше действовать, чем размышлять, многие вещи предпочитаете делать своими руками, не доверяя этого другим. Охотно занимаетесь бытовыми или практическими делами, заботитесь об окружающих. Ваши высказывания конкретны, вы не любите предположений и догадок, а также не испытанных на практике идей и методов работы. Внимательны к деталям, охотно все уточняете и проверяете сделанное</button>
          <button class="test__item" data-number="6">Вы - человек с развитым воображением, хорошо предвидите дальнейший ход событий. Склонны к сомнениям, не всегда уверены в себе, часто проявляете непрактичность в материальных вопросах. Любите творческую деятельность, поиск и эксперимент больше, чем гарантированную выгоду. Легко догадываетесь о том, что могло бы быть сделано и сказано другими и не нуждаетесь в уточнениях. Довольно рассеяны и неохотно проверяете сделанное.</button>
      </div>
      <div class="test__questions dn">
          <button class="test__item" data-number="7">Вы не любите чем-либо выделяться среди окружающих, выставлять свои заслуги напоказ. Предпочитаете больше слушать собеседника, чем высказываться. Не стремитесь брать на себя инициативу и ответственность за других. Вам ясен и понятен свой внутренний мир, поступки и побуждения, но вы не спешите рассказывать другим о себе и своих планах. Личная самооценка для вас значит больше, чем оценка окружающих.</button>
          <button class="test__item" data-number="8">Ваш внутренний мир достаточно сложный и противоречивый, поэтому вам легче охарактеризовать знакомого человека, чем самого себя. Вы склонны поступать опрометчиво, можете брать на себя слишком много дел или обязательств. Нуждаетесь в переменах занятий, проявляете инициативу в новых делах или знакомствах. Охотно делитесь своими переживаниями с другими людьми и нуждаетесь в их оценке ваших личных качеств и правильности поступков.</button>
      </div>
      <button class="test__arrow_back">❮</button>
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

            buttons.forEach(elem => {
                elem.addEventListener('click', function (e) {
                    count ++;
                    let parentNode = elem.closest('.test__questions')
                    parentNode.querySelectorAll('.test__item').forEach(elem => elem.classList.remove('active'))
                    elem.classList.add('active')
                    if(count < 5){
                        parentNode.classList.add('dn')
                    }
                    showQuestion(count)
                })
            })

            document.querySelector('.test__arrow_back').addEventListener('click', ()=>{
                count --;
                if(count >= 1){
                    showQuestion(count)
                } else {
                    count = 1
                }
            })


            function showQuestion(num){
                if(num < 5){
                    let blocks = document.querySelectorAll('.test__questions')
                    blocks.forEach(elem => {
                        elem.classList.add('dn')
                    })
                    let targetBlock = blocks[num - 1]
                    if(typeof(targetBlock) != 'undefined' && targetBlock != null){
                        targetBlock.classList.remove('dn')
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
                document.querySelector('.test').innerHTML = `
                    <div class="text">
                    <h1>Ваш социотип ${res['name']}</h1>
                    <div class="test__description">${res['description']}</div>
                    <div class="test__description test__annotation">По тесту сразу определить социотип сложно. Кроме того описание примерное, обобщенное. Если оно совсем не подходит пройдите тест еще раз, либо пройдите <a href="{{route('tests')}}">другой тест</a>. Также можно пройти бесплатное <a href="{{route('tipirovanie')}}">типирование</a>.</div>
                    <div class="test__refresh"><a href="{{ route('meged') }}">Пройти заново</a></div></div>`
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }


            let sociotypes = {
                1: [2,3,6,8],
                2: [2,4,5,7],
                3: [1,4,5,8],
                4: [1,3,6,7],
                5: [1,4,6,8],
                6: [1,3,5,7],
                7: [2,3,5,8],
                8: [2,4,6,7],
                9: [2,4,5,8],
                10: [2,3,6,7],
                11: [1,3,6,8],
                12: [1,4,5,7],
                13: [1,3,5,8],
                14: [1,4,6,7],
                15: [2,4,6,8],
                16: [2,3,5,7]
            }


        })()



    </script>
@endpush















