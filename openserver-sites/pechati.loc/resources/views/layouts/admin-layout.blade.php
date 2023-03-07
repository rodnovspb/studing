<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
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

          /*Функция загрузки файла через ckfinder*/
          function openPopup() {
            CKFinder.popup( {
              chooseFiles: true,
              onInit: function( finder ) {
                finder.on( 'files:choose', function( evt ) {
                  let file = evt.data.files.first();
                  document.getElementById( 'img_file' ).src = file.getUrl(); // показываем изображение
                  document.getElementById( 'input_file' ).value = file.getUrl();} ); // показываем путь к файлу
                finder.on( 'file:choose:resizedImage', function( evt ) { // срабатывает если меняли размеры
                  document.getElementById( 'img_file' ).src = evt.data.resizedUrl; // показываем изображение
                  document.getElementById( 'input_file' ).value = file.getUrl();} );}} );} // показываем путь к файлу

          document.addEventListener('DOMContentLoaded', function (e) {
              togglePartsCreateProductPage()
            })

          function togglePartsCreateProductPage(){
            let select = document.querySelector('#select_product_type')
            let selectSubtype = document.querySelector('#select_product_subtype')
            let nameTr = document.querySelector('#name_create_product_page')
            let videoTr = document.querySelector('#video_create_product_page')
            let subTemplates = document.querySelectorAll('.subtype_templates')
            let subCases = document.querySelectorAll('.subtype_cases')

            if( typeof(select) == 'undefined' || select == null ) return false;
            if( typeof(nameTr) == 'undefined' || nameTr == null ) return false;

            if(select.value == 'template'){
              nameTr.classList.add('dn')
              videoTr.classList.add('dn')
              subCases.forEach(elem => elem.classList.add('dn'))
              subTemplates.forEach(elem => elem.classList.remove('dn'))
            } else if(select.value == 'case'){
              nameTr.classList.remove('dn')
              videoTr.classList.remove('dn')
              subCases.forEach(elem => elem.classList.remove('dn'))
              subTemplates.forEach(elem => elem.classList.add('dn'))
            }

            select.addEventListener('change', function (e) {
                selectSubtype.querySelectorAll('option').forEach(elem => elem.selected = false)
                select.value == 'template' ? nameTr.classList.add('dn') : nameTr.classList.remove('dn')
                select.value == 'template' ? videoTr.classList.add('dn') : videoTr.classList.remove('dn')
                if(select.value == 'template'){
                  subCases.forEach(elem => elem.classList.add('dn'))
                  subTemplates.forEach(elem => elem.classList.remove('dn'))
                } else if(select.value == 'case'){
                  subCases.forEach(elem => elem.classList.remove('dn'))
                  subTemplates.forEach(elem => elem.classList.add('dn'))
                }
              })

          }




      </script>

    </footer>
  </div>
  </div>

</body>

</html>
