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
    private $model;
    private $cost;
    public function __construct($model, $cost)
    {
        $this->model = $model;
        $this->cost = $cost;
    }
    public function getModel(){
      return $this->model;
	}
    public function getCost(){
        return $this->cost;
    }
}

$bmw = new Car('кабриолет', 3000);

var_dump($bmw->getCost());