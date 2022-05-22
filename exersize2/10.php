<?php



function divide($num1, $num2){
    try{
        if($num2 === 0){
            throw new Exception('Деление на 0', 111);
        }
        echo $num1/$num2;
    } catch (Exception $e){
        $message = $e->getMessage();
        $code = $e->getCode();
        $line = $e->getLine();
        echo "$message  с кодом $code на строчке $line в файле {$e->getFile()}";

    } finally {
        echo "Функция завершена";
    }
}

divide(3, 0);


?>

<script>
    function div(num1, num2){
        if(num2 === 0){
          throw new ReferenceError('Деление на 0')
        }
        return num1/num2
      }




try {
  div(2,0)
} catch (e){
      console.log(e.message)
      console.log(e.name)
} finally {
  console.log('finally')
}





</script>