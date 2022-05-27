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



</script>












</body>
</html>
<?php



class Car {
  private $color = 'N/A';
  public function __construct($color = null)
  {
    if($color){
      $this->color = $color;
	}
  }
  public function getColor(){
    return "Находится в классе " . __CLASS__ .", цвет:" . $this->color;
  }
}

$a = new Car('Черный');

echo $a->getColor();