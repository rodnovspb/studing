
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Документ</title>
<style>
    .main {
        padding: 15px;
    }

</style>
</head>
<body>

<input type="number" class="number">
<input type="submit" class="submit">
<div class="main">
    <ul class="ul"></ul>
</div>


<script>
let btn = document.querySelector('.submit')
let ul = document.querySelector('.ul')
let number = document.querySelector('.number')
btn.addEventListener('click', function (){
  let count = document.querySelectorAll('ul li').length
  let amount = number.value || 0;
  fetch(`ajax.php?count=${count}&amount=${amount}`)
  .then(res=>res.json())
  .then(res=>func(res))
})

function func(arr){
  let result = '';
  arr.forEach(elem=>{
    result+=`<li>id: ${elem.id}, имя: ${elem.name}, фамилия: ${elem.surname}, возраст: ${elem.age}, зарплата: ${elem
	.salary}</li>`
  })
  ul.innerHTML+=result
}






</script>












</body>
</html>
