@extends('layouts.layout')

@section('title', 'Результаты')
@section('description', 'Результаты')
@section('keywords', 'Результаты')

@section('content')
<div class="container container--res">
    <section class="result">
      <table class="result__table">
        <thead>
          <tr>
          <th>id</th>
          <th>Контакты</th>
          <th>Дихотомии</th>
          <th>Функции</th>
          <th>Дата</th>
        </tr>
        </thead>
        <tbody class="result__list">
          @foreach($answers as $answer)
            <tr>
              <td>{{ $answer->id }}</td>
              <td>{{ $answer->contact }}</td>
              <td>
                <div>Рац: {{ $answer->answers['dichotomies']['ratio'] ?? null }}</div>
                <div>Иррац: {{ $answer->answers['dichotomies']['irratio'] ?? null}}</div>
                <div>Логика: {{ $answer->answers['dichotomies']['logic'] ?? null}}</div>
                <div>Этика: {{ $answer->answers['dichotomies']['ethic'] ?? null}}</div>
                <div>Сенсорика: {{ $answer->answers['dichotomies']['sens'] ?? null}}</div>
                <div>Интуиция: {{ $answer->answers['dichotomies']['intuit'] ?? null}}</div>
                <div>Интроверсия: {{ $answer->answers['dichotomies']['intro'] ?? null}}</div>
                <div>Экстраверсия: {{ $answer->answers['dichotomies']['extr'] ?? null}}</div>
              </td>
              <td>
                <div class="result__block">
                  <h3>Нравится</h3>
                  @isset($answer->answers['preferences']['like'])
                    @foreach($answer->answers['preferences']['like'] as $num)
                      <div class="result__item">
                        <span>{{ $sctivities[$num-1]['text'] }}</span>
                        @if(array_key_exists($num, $answer->answers["comments"]))
                          <span class="result__comment">({{ $answer->answers["comments"][$num] }})</span>
                        @endif
                      </div>
                    @endforeach
                  @endisset
                </div>
                <div class="result__block">
                  <h3>Получается</h3>
                  @isset($answer->answers['preferences']['can'])
                    @foreach($answer->answers['preferences']['can'] as $num)
                      <div class="result__item">
                        <span>{{ $sctivities[$num-1]['text'] }}</span>
                        @if(array_key_exists($num, $answer->answers["comments"]))
                          <span class="result__comment">({{ $answer->answers["comments"][$num] }})</span>
                        @endif
                      </div>
                    @endforeach
                  @endisset
                </div>
                <div class="result__block">
                  <h3>Нравится в людях</h3>
                  @isset($answer->answers['preferences']['like-people'])
                    @foreach($answer->answers['preferences']['like-people'] as $num)
                      <div class="result__item">
                        <span>{{ $sctivities[$num-1]['text'] }}</span>
                        @if(array_key_exists($num, $answer->answers["comments"]))
                          <span class="result__comment">({{ $answer->answers["comments"][$num] }})</span>
                        @endif
                      </div>
                    @endforeach
                  @endisset
                </div>
                <div class="result__block">
                  <h3>Нейтрально</h3>
                  @isset($answer->answers['preferences']['neutral'])
                    @foreach($answer->answers['preferences']['neutral'] as $num)
                      <div class="result__item">
                        <span>{{ $sctivities[$num-1]['text'] }}</span>
                        @if(array_key_exists($num, $answer->answers["comments"]))
                          <span class="result__comment">({{ $answer->answers["comments"][$num] }})</span>
                        @endif
                      </div>
                    @endforeach
                  @endisset
                </div>
                <div class="result__block">
                  <h3>Не нравится</h3>
                  @isset($answer->answers['preferences']['not-like'])
                    @foreach($answer->answers['preferences']['not-like'] as $num)
                      <div class="result__item">
                        <span>{{ $sctivities[$num-1]['text'] }}</span>
                        @if(array_key_exists($num, $answer->answers["comments"]))
                          <span class="result__comment">({{ $answer->answers["comments"][$num] }})</span>
                        @endif
                      </div>
                    @endforeach
                  @endisset
                </div>
                <div class="result__block">
                  <h3>Не получается</h3>
                  @isset($answer->answers['preferences']['cannot'])
                    @foreach($answer->answers['preferences']['cannot'] as $num)
                      <div class="result__item">
                        <span>{{ $sctivities[$num-1]['text'] }}</span>
                        @if(array_key_exists($num, $answer->answers["comments"]))
                          <span class="result__comment">({{ $answer->answers["comments"][$num] }})</span>
                        @endif
                      </div>
                    @endforeach
                  @endisset
                </div>
              </td>
              <td>{{ $answer->created_at }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </section>

</div>

@endsection
