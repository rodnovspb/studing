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

<?php
    if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['age']) && !empty($_POST['salary'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];
        $query = "INSERT INTO employees SET name ='$name', surname ='$surname', age = '$age', salary = '$salary'";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $id = mysqli_insert_id($link);
        $query = "SELECT * FROM employees ORDER BY id DESC";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
        $obj = ['id'=>$id, 'data'=>$data];
        exit(json_encode($obj));

    }elseif (isset($_POST['id'])){
        $nameText = $_POST['nameText'];
        $surnameText = $_POST['surnameText'];
        $ageText = $_POST['ageText'];
        $salaryText = $_POST['salaryText'];
        $id = $_POST['id'];
        $query = "UPDATE employees SET name ='$nameText', surname ='$surnameText', age = '$ageText', salary = '$salaryText' WHERE id = '$id'";
        mysqli_query($link, $query) or die(mysqli_error($link));
        $success = mysqli_affected_rows($link);
        $query = "SELECT * FROM employees ORDER BY id DESC";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
        exit(json_encode($data));

    } else{
        $query = "SELECT * FROM employees ORDER BY id DESC";
        $res = mysqli_query($link, $query) or die(mysqli_error($link));
        for($data = []; $row = mysqli_fetch_assoc($res); $data[]=$row);
        exit(json_encode($data));
    }




?>
