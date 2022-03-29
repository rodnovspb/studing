<?php
if(!empty($_SESSION['id'])){
  $var = "id$_SESSION[id]";
} else $var = null; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
  h1 {
    text-align: center;
  }
  p {
    font-size: 24px;
  }

</style>
</head>
<body>

<h1>Пользователь не найден</h1>
<p>Перенаправление на главную страницу через <span>2</span> секунды</p>
<script>
  let span = document.querySelector('span')
  let id = setInterval(function (){
    let a = Number(span.innerHTML)
    if(a>0) {
      a--
      span.innerHTML = String(a)
    }
    else {
      clearInterval(id);
	  location.href="/<?=$var?>"
    }

  }, 1000)
</script>













</body>
</html>