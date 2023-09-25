<h2>Приветствую!</h2>
<div>Заполнена анкета: {{ route('show_questionnaire') }}</div>
@isset($contact)
  <div>Контакты: {{ $contact }}</div>
@endisset
