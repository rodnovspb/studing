<?php
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 'on');
$host = "localhost";
$user = 'root';
$pass = '';
$name = 'mydb';
$link = mysqli_connect($host, $user, $pass, $name);
mysqli_query($link, "SET NAMES 'utf8'");

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>


</style>
</head>
<body>
<?php
$query = "SELECT id, surname FROM employees";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row);
?>

<ul class="ul">
    <?php
    if(!empty($data)):
        foreach ($data as $datum):
            echo "<li><a href='#' data-id='$datum[id]'>$datum[surname]</a></li>";
        endforeach;
    endif;
    ?>
</ul>
<div class="more"></div>


<script>

  let li = document.querySelectorAll('.ul a')
  li.forEach(function (elem){
    elem.addEventListener('click', function (e){
      e.preventDefault()
      let data = elem.dataset.id
      let params = new URLSearchParams();
      params.set('key', data)
      fetch('ajax.php', {
        method: 'POST',
        body: params
      }).then(res=>res.json())
        .then(res=>func(res))
    })
  })

  function func(obj) {
    document.querySelector('.more').innerHTML =
    `<span>
		Имя: ${obj.name}, фамилия: ${obj.surname}, зарплата: ${obj.salary}
	</span`

  }



</script>












</body>
</html>

