
<meta name="csrf-token" content="{{ csrf_token() }}">


<form id="form" action="" style="display: flex; flex-direction: column; gap: 20px;" method="post" enctype="multipart/form-data">
    <input type="hidden" name="formid" value="myForm">
    <input type="text" name="name" placeholder="Имя">
    <input type="text" name="email" placeholder="Почта">
    <input type="file" name="file">
    <textarea name="message" cols="30" rows="10" placeholder="Сообщение"></textarea>
    <input type="submit">
</form>

<script>
   let form = document.querySelector('#form')
   form.addEventListener('submit', function (e) {
       e.preventDefault()
       fetch('{{ route('sendContacts') }}', {
           method: "POST",
           headers: {
               'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
           },
           body: new FormData(form)
       }).then(res=>res.json())
         .then(res=>console.log(res))
         .catch(e=>console.log(e))
   })
</script>




