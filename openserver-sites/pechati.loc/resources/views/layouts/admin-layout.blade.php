<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('storage/fonts/fonts.css') }}">
  <script src="{{ env('APP_URL') . '/ckeditor/ckeditor/ckeditor.js' }}"></script>
  <script src="{{ env('APP_URL') . '/ckeditor/ckfinder/ckfinder.js' }}"></script>
  <script src="{{ env('APP_URL') . '/ckeditor/ckfinder/ckfinder.js' }}"></script>

  <title>Административная панель</title>
</head>

<body>
  <div class="wrapper">
    @include('admin.left')
      <footer class="footer__admin">
      <div class="container">
        <div class="footer__links">
          <div>
            <form action="{{ route('admin-logout') }}" method="post">
              @csrf
                <button type="submit">Выйти</button>
            </form>
          </div>
          <div>
            <a href="{{ route('clear') }}">Очистить кеш</a>
          </div>
          <div>
            <a href="{{ route('set_cache') }}">Закешировать</a>
          </div>
        </div>
      </div>
      <script>
          window.addEventListener('load', ()=>{
              if(document.body.querySelector('#ckeditor')){
                  CKEDITOR.replace('ckeditor', {
                      filebrowserBrowseUrl:  "/ckeditor/ckfinder/ckfinder.html",
                      filebrowserUploadUrl:  '/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                  })}})

      </script>

    </footer>
  </div>
  </div>

</body>

</html>
