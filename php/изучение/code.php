<?php




















function delElem ($elem, $arr){
   for($i=0; $i<count($arr); $i++){
       if($elem===$arr[$i]){
           array_splice($arr, $i, 1);
       }
   }
   return $arr;
}


echo '<pre>';
print_r(delElem(5, [1,2,3,4,5,6,7,5,8]));
echo '</pre>';




























?>