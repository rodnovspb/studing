

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




<script>





function printNumbers(from, to) {

  function go(){
    console.log(from)
  }
  go()

 let id = setInterval(function (){
   from++
   go()
   if(from===to) clearInterval(id)
 }, 1000)

}



printNumbers(5, 10)



</script>








</body>
</html>
