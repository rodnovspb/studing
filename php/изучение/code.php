<?php







$arr = [
    ['name' => 'user1', 'age' => 30, 'salary' => 500],
    ['name' => 'user2', 'age' => 31, 'salary' => 600],
    ['name' => 'user3', 'age' => 32, 'salary' => 700],
];




echo "<table>";
    foreach ($arr as $row){
        echo "<tr>";
        foreach ($row as $key=>$value){
            if($key==='salary'){
                echo "<td>$value dollars</td>";
            }
            else {
                echo "<td>$value</td>";
            }

        }
        echo "</tr>";
    }
echo "</table>";























































?>