<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
</head>
<body>

<p>Через несколько секунд будете перенаправлены, нажмите кнопку, если не хотите ждать</p>

<?php if(!empty($_SESSION['payment'])): ?>
    <form id="payment" name="payment" method="POST" action="https://sci.interkassa.com/" enctype="utf-8">
        <input type="hidden" name="s" value="WgCtA4Y2IS" />
        <input type="submit" value="Pay">
    </form>


<?php endif; ?>
















<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>

<script>
    setTimeout(function (){
      $('form').submit()
      console.log('работает')
    }, 2000)
</script>

</body>
</html>
