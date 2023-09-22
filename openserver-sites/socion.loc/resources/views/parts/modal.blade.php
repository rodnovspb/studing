@if(session()->has('success'))
    <script>
        let success = {{ session('success') }}
        if(success){
           alert('Анкета отправилась')
        } else {
            alert('Произошла ошибка')
        }
    </script>
@endif

