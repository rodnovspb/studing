<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>







  <form action="" method="post">
    @csrf
      <input type="text" name="name" value=" {{ old('name') }}">
    <input type="text" name="surname" value="{{ old('surname') }}">
    <input type="text" name="pass">
    <input type="checkbox" name="check">
      <input type="text" name="pass">
      <input type="text" name="name">
      <input type="text" name="password">
    <input type="submit">
</form>

{{--  перевод с иностранного--}}
  {{ __("Confirm your :amount payment", ['amount'=> "300 руб."]) }}

  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif


{{--@if($errors->has('surname'))--}}
{{--    <div> surname ошибка </div>--}}
{{--@endif--}}













</body>
</html>




