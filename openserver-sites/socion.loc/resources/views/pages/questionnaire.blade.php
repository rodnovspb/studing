@extends('layouts.layout')

@section('title', 'Соционическая анкета | СОЦИОН.РФ')
@section('description', 'Соционическая анкета')
@section('keywords', 'Соционическая анкета')

@section('content')

<section class="questionnaire">
<h1>Анкета перед типированием</h1>
<form action="{{ route('send_questionnaire') }}" class="questionnaire__form" method="post">
    @csrf
    <h2>1 этап. Тест Мегедь-Овчарова</h2>
    <ul class="questionnaire__meged">
        <li>
            <div class="text">Вам нравятся ясность и определенность во всем, поэтому вы не склонны менять свои планы, убеждения и привычки. Неопределенность и многовариативность возможных решений вас раздражает. Вы не любите ничего откладывать "на потом", умеете равномерно распределять нагрузку и укладываться в заранее намеченные сроки. Предпочитаете иметь четко обозначенные задачи и конкретный временной график работы
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
              <label>-5<input type="radio" name="ratio" value="-5"></label>
              <label>-4<input type="radio" name="ratio" value="-4"></label>
              <label>-3<input type="radio" name="ratio" value="-3"></label>
              <label>-2<input type="radio" name="ratio" value="-2"></label>
              <label>-1<input type="radio" name="ratio" value="-1"></label>
              <label>0<input type="radio" name="ratio" value="0"></label>
              <label>1<input type="radio" name="ratio" value="1"></label>
              <label>2<input type="radio" name="ratio" value="2"></label>
              <label>3<input type="radio" name="ratio" value="3"></label>
              <label>4<input type="radio" name="ratio" value="4"></label>
              <label>5<input type="radio" name="ratio" value="5"></label>
            </div>
        </li>

        <li>
            <div class="text">Вы не составляете четких планов на будущее, так как любите действовать без подготовки, по ситуации, рассчитывая на находчивость и везение. Вас не очень тяготит неопределенность, вы любите иметь в запасе несколько возможных вариантов решения проблемы. Вы легко переключаетесь с одного дела на другое, охотно пересматриваете прежние взгляды и решения. Вам трудно укладываться в сроки, подчиняться строгому графику или распорядку
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
                <label>-5<input type="radio" name="irratio" value="-5"></label>
                <label>-4<input type="radio" name="irratio" value="-4"></label>
                <label>-3<input type="radio" name="irratio" value="-3"></label>
                <label>-2<input type="radio" name="irratio" value="-2"></label>
                <label>-1<input type="radio" name="irratio" value="-1"></label>
                <label>0<input type="radio" name="irratio" value="0"></label>
                <label>1<input type="radio" name="irratio" value="1"></label>
                <label>2<input type="radio" name="irratio" value="2"></label>
                <label>3<input type="radio" name="irratio" value="3"></label>
                <label>4<input type="radio" name="irratio" value="4"></label>
                <label>5<input type="radio" name="irratio" value="5"></label>
            </div>
        </li>

        <li>
            <div class="text">В своих решениях вы, прежде всего, опираетесь на факты и здравый смысл, не ставя их в зависимость от ваших чувств и отношений с окружающими. Умеете логично обосновывать свою точку зрения, руководствуясь аргументами и доказательствами, а не личными переживаниями. Считаете, что важнее быть правым, чем приятным. Не делаете незаслуженных комплиментов. Не любите обсуждать темы личной жизни других людей
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
                <label>-5<input type="radio" name="logic" value="-5"></label>
                <label>-4<input type="radio" name="logic" value="-4"></label>
                <label>-3<input type="radio" name="logic" value="-3"></label>
                <label>-2<input type="radio" name="logic" value="-2"></label>
                <label>-1<input type="radio" name="logic" value="-1"></label>
                <label>0<input type="radio" name="logic" value="0"></label>
                <label>1<input type="radio" name="logic" value="1"></label>
                <label>2<input type="radio" name="logic" value="2"></label>
                <label>3<input type="radio" name="logic" value="3"></label>
                <label>4<input type="radio" name="logic" value="4"></label>
                <label>5<input type="radio" name="logic" value="5"></label>
            </div>
        </li>

        <li>
            <div class="text">Вас глубоко интересуют темы, связанные с чувствами и отношениями между людьми. Вы охотно участвуете в обсуждении и решении их личных проблем, стараетесь улучшить взаимопонимание, так как не выносите разногласий и обид в своем окружении. Вам нравится делать другим комплименты, создавать теплую и приятную атмосферу общения. Вам трудно объективно оценивать тех, кому вы симпатизируете и тех, кто вам неприятен. Вы можете ставить личные отношения выше деловых
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
                <label>-5<input type="radio" name="ethic" value="-5"></label>
                <label>-4<input type="radio" name="ethic" value="-4"></label>
                <label>-3<input type="radio" name="ethic" value="-3"></label>
                <label>-2<input type="radio" name="ethic" value="-2"></label>
                <label>-1<input type="radio" name="ethic" value="-1"></label>
                <label>0<input type="radio" name="ethic" value="0"></label>
                <label>1<input type="radio" name="ethic" value="1"></label>
                <label>2<input type="radio" name="ethic" value="2"></label>
                <label>3<input type="radio" name="ethic" value="3"></label>
                <label>4<input type="radio" name="ethic" value="4"></label>
                <label>5<input type="radio" name="ethic" value="5"></label>
            </div>
        </li>

        <li>
            <div class="text">Вы - реалист и практик, любите больше действовать, чем размышлять, многие вещи предпочитаете делать своими руками, не доверяя этого другим. Охотно занимаетесь бытовыми или практическими делами, заботитесь об окружающих. Ваши высказывания конкретны, вы не любите предположений и догадок, а также не испытанных на практике идей и методов работы. Внимательны к деталям, охотно все уточняете и проверяете сделанное собой и другими
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
                <label>-5<input type="radio" name="sens" value="-5"></label>
                <label>-4<input type="radio" name="sens" value="-4"></label>
                <label>-3<input type="radio" name="sens" value="-3"></label>
                <label>-2<input type="radio" name="sens" value="-2"></label>
                <label>-1<input type="radio" name="sens" value="-1"></label>
                <label>0<input type="radio" name="sens" value="0"></label>
                <label>1<input type="radio" name="sens" value="1"></label>
                <label>2<input type="radio" name="sens" value="2"></label>
                <label>3<input type="radio" name="sens" value="3"></label>
                <label>4<input type="radio" name="sens" value="4"></label>
                <label>5<input type="radio" name="sens" value="5"></label>
            </div>
        </li>

        <li>
            <div class="text">Вы - человек с развитым воображением, хорошо предвидите дальнейший ход событий. Склонны к сомнениям, не всегда уверены в себе, часто проявляете непрактичность в материальных вопросах. Любите творческую деятельность, поиск и эксперимент больше, чем гарантированную выгоду. Легко догадываетесь о том, что могло бы быть сделано и сказано другими и не нуждаетесь в уточнениях. Довольно рассеяны и неохотно проверяете сделанное
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
                <label>-5<input type="radio" name="intuit" value="-5"></label>
                <label>-4<input type="radio" name="intuit" value="-4"></label>
                <label>-3<input type="radio" name="intuit" value="-3"></label>
                <label>-2<input type="radio" name="intuit" value="-2"></label>
                <label>-1<input type="radio" name="intuit" value="-1"></label>
                <label>0<input type="radio" name="intuit" value="0"></label>
                <label>1<input type="radio" name="intuit" value="1"></label>
                <label>2<input type="radio" name="intuit" value="2"></label>
                <label>3<input type="radio" name="intuit" value="3"></label>
                <label>4<input type="radio" name="intuit" value="4"></label>
                <label>5<input type="radio" name="intuit" value="5"></label>
            </div>
        </li>

        <li>
            <div class="text">Вы не любите чем-либо выделяться среди окружающих, выставлять свои заслуги напоказ. Предпочитаете больше слушать собеседника, чем высказываться. Не стремитесь брать на себя инициативу и ответственность за других. Вам ясен и понятен свой внутренний мир, поступки и побуждения, но вы не спешите рассказывать другим о себе и своих планах. Личная самооценка для вас значит больше, чем оценка окружающих
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
                <label>-5<input type="radio" name="intro" value="-5"></label>
                <label>-4<input type="radio" name="intro" value="-4"></label>
                <label>-3<input type="radio" name="intro" value="-3"></label>
                <label>-2<input type="radio" name="intro" value="-2"></label>
                <label>-1<input type="radio" name="intro" value="-1"></label>
                <label>0<input type="radio" name="intro" value="0"></label>
                <label>1<input type="radio" name="intro" value="1"></label>
                <label>2<input type="radio" name="intro" value="2"></label>
                <label>3<input type="radio" name="intro" value="3"></label>
                <label>4<input type="radio" name="intro" value="4"></label>
                <label>5<input type="radio" name="intro" value="5"></label>
            </div>
        </li>

        <li>
            <div class="text">Ваш внутренний мир достаточно сложный и противоречивый, поэтому вам легче охарактеризовать знакомого человека, чем самого себя. Вы склонны поступать опрометчиво, можете брать на себя слишком много дел или обязательств. Нуждаетесь в переменах занятий, проявляете инициативу в новых делах или знакомствах. Охотно делитесь своими переживаниями с другими людьми и нуждаетесь в их оценке ваших личных качеств и правильности поступков
            </div>

            <div class="questionnaire__respond">
              <span>Не подходит</span>
              <span>Подходит</span>
            </div>

            <div class="meged__inputs">
                <label>-5<input type="radio" name="extr" value="-5"></label>
                <label>-4<input type="radio" name="extr" value="-4"></label>
                <label>-3<input type="radio" name="extr" value="-3"></label>
                <label>-2<input type="radio" name="extr" value="-2"></label>
                <label>-1<input type="radio" name="extr" value="-1"></label>
                <label>0<input type="radio" name="extr" value="0"></label>
                <label>1<input type="radio" name="extr" value="1"></label>
                <label>2<input type="radio" name="extr" value="2"></label>
                <label>3<input type="radio" name="extr" value="3"></label>
                <label>4<input type="radio" name="extr" value="4"></label>
                <label>5<input type="radio" name="extr" value="5"></label>
            </div>
        </li>
    </ul>

    <h2>2 этап. Виды деятельности</h2>
    <div class="text">Отметьте способности. Можно выбирать несколько кнопок</div>
    <ul class="activity">
        @foreach($activities as $activity)
            <li>
                <div class="activity__type">{{ $activity->text }}</div>
                <div class="activity__btns">
                    <label>Нравится<input type="checkbox" name="act_{{ $activity->id }}_like"></label>
                    <label>Получается<input type="checkbox" name="act_{{ $activity->id }}_can"></label>
                    <label>Нравится в людях<input type="checkbox" name="act_{{ $activity->id }}_like-people"></label>
                    <label>Безразлично<input type="checkbox" name="act_{{ $activity->id }}_neutral"></label>
                    <label>Не нравится<input type="checkbox" name="act_{{ $activity->id }}_not-like"></label>
                    <label>Не получается<input type="checkbox" name="act_{{ $activity->id }}_cannot"></label>
                </div>
                <textarea class="activity__comment" rows="1" name="comment_{{ $activity->id }}" placeholder="Пояснения если есть"></textarea>
            </li>
        @endforeach
    </ul>

    <textarea class="questionnaire__other" rows="3" name="questionnaire__other" placeholder="Напишите имя, оставьте телеграм/вотсап. Также здесь можно указать любую полезную для типирования информацию" required></textarea>

    <button class="questionnaire__btn" type="submit">Отправить</button>
</form>
    </section>



@endsection

@push('script')
    <script>
        let meged_labels = document.querySelectorAll('.meged__inputs label');
        if(meged_labels && meged_labels.length > 0){
            meged_labels.forEach(elem => {
                elem.addEventListener('click', function (){
                    elem.closest('.meged__inputs').querySelectorAll('label').forEach(elem=>{
                        elem.classList.remove('active')
                    })
                    if(elem.querySelector('input:checked')){
                        elem.classList.add('active')
                    }
                })
            })
        }

        let activity_labels = document.querySelectorAll('.activity__btns label');
        if(activity_labels && activity_labels.length > 0){
            activity_labels.forEach(elem => {
                elem.addEventListener('click', function (){
                    if(elem.querySelector('input:checked')){
                        elem.classList.add('active')
                    } else {
                        elem.classList.remove('active')
                    }
                })
            })
        }

    </script>

@endpush
