<x-layout>
    <x-slot:title>
        Заголовок
    </x-slot:title>

    @php
        for($i=0; $i<10; $i++){
            echo "<p>$i</p>";
        }   
    @endphp

    @for($i=0; $i<count($arr4); $i++)
        <p>{{$i}} {{$arr4[$i]}}</p>
    @endfor

    @foreach($arr4 as $elem)
        @continue($elem==0)
        <p>{{$elem}}</p>
    @endforeach

    @foreach($arr4 as $elem)
        @break($elem == 0)
        <p>{{$elem}}</p>
    @endforeach

    @foreach($arr1 as $item)
            @break($loop->last)
        {{$item}}
    @endforeach


    @foreach($arr1 as $item)
        <p><b>{!! $loop->remaining < $loop->count-1 ? '<i>':null!!}{{$item}}{!! $loop->remaining < $loop->count-1 ?
        '</i>':null !!}</b></p>
    @endforeach
    <ul>
        @foreach($arrOfStr as $item)
            <li {{$loop->first ? 'class=first': null}}{{$loop->last ? 'class=last': null}}>{{$loop->iteration}}
                {{$item}}</li>
        @endforeach
    </ul>

    @foreach($arr as $item)

        @if($loop->first)
            первая итерация
        @endif
        @if($loop->last)
            последняя итерация
        @endif
        @if($loop->odd)
            нечетная итерация
        @endif
        @if($loop->even)
            четная итерация
        @endif
        {{$loop->index}}
        {{$loop->iteration}}
        {{$loop->remaining}}
        {{$loop->count}}
        <p>{{$item}}</p>
    @endforeach

    @forelse($var5 as $elem)
        <p>{{$elem}}</p>
    @empty
        <p>Пустой массив</p>
    @endforelse
    <table>
        @foreach($elements as $elem)
            <tr>
            @foreach($elem as $key=>$value)
            <td>{{$value}}</td>
            @endforeach
            </tr>
        @endforeach
    </table>

    <ul>
    @foreach($elements as $elem)
        <li>{{$elem['name']}} {{$elem['surname']}} {{$elem['salary']}}</li>
    @endforeach
    </ul>
    <table>
        @foreach($table as $tr)
            <tr>
            @foreach($tr as $td)
                    <td>{{$td}}</td>
            @endforeach
            </tr>
        @endforeach
    </table>

    @foreach($array as $arr2)
        @if(is_array($arr2))
            @foreach($arr2 as $item)
                <p>{{$item}}</p>
            @endforeach
        @else
            <p>{{$arr2}}</p>
        @endif
    @endforeach

    @if(is_array($data))
        <p>Дата - массив</p>
    @else
        <p>Не массив</p>
    @endif

    @if(count($arr1)>1)
    <ul>
    @foreach($arr1 as $key=>$value)
        @if($value % 2 === 0)
        <li>{{($key+1)}} {{$value}}</li>
        @endif
    @endforeach
    </ul>
    @endif
    @if(count($arr1) > 0)
        <p>{{array_sum($arr1)}}</p>
    @else
        <p>Нулевой массив</p>
    @endif
    @unless($correct)
    <p>Неверно</p>
    @endunless

    @if($age>18 and $age < 33)
        <p>Вход разрешен</p>
    @elseif($age>33)
        <p>Вам больше 33</p>
    @else
        <p>Вход не разрешен</p>
    @endif
    @if($isAuth)
        <p>Вы авторизованы</p>
    @else
        <p>Вы не авторизованы</p>
    @endif
    @if(count($employee)>=3)
        <p>В массиве больше (или равно) 3 элементов</p>
    @endif
    <p>{!! $str !!}</p>
    <p>{{$script}}</p>
{{--    <p>{{$year ?? date('Y')}}</p>--}}
    <p>{{$month ?? date('m')}}<span> {{$day ?? date('d')}}</span></p>
    <p>{{$location['country'] ?? 'Казахстан'}}</p>
    <p>{{$location['city'] ?? 'Нурсултан'}}</p>
    <p>{{$city ?? 'Москва'}}</p>
    <p>{{$year ?? date('Y')}}</p>
    <p>{{$value1 ?? 'не определен'}}</p>
    <p>{{count($employee)}}</p>
    <p>Имя: {{$employee['name']}}</p>
    <p>Возраст: {{$employee['age']}}</p>
    <p>Зарплата: {{$employee['salary']}}</p>
    <p>{{array_sum($arr)}}</p>
    <p>{{count($arr)}}</p>
    <p>{{$page}}</p>
    <p>{{$name}}</p>
    <p>{{$age}}</p>
    <p class="{{$class}}">{{$salary}}</p>
    <input type="text" value="{{$value1}}">
    <input type="text" value="{{$value2}}">
    <input type="text" value="{{$value3}}">
    <p style="{{$style}}">Красный абзац</p>
    <a href="{{$href}}">{{$text}}</a>
    <p>Таймштамп: {{time()}}</p>
    <p>Дата {{date('d.m.Y')}}</p>
    <p>{{$arr[1]+$arr[2]}}</p>
    <p>{{'qwe'}}</p>
</x-layout>
