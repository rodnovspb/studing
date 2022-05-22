<?php



function divide($num1, $num2){
    try{
        if($num2 === 0){
            throw new Exception('Деление на 0');
        }
        echo $num1/$num2;
    } catch (Exception $e){
        echo $e;
    } finally {
        echo "Функция завершена";
    }
}

divide(3, 87878);


?>

<script>
    function div(num1, num2){
        if(num2 === 0){
          throw new Error('Деление на 0')
        }
        return num1/num2
      }




try {
  div(2,0)
} catch (e){
      console.log(e)
} finally {
  console.log('finally')
}





</script>