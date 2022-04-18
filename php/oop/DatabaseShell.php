<?php

class DatabaseShell {
    private $link;
    public function __construct($host, $user, $password, $database)
    {
        $this->link=mysqli_connect($host, $user, $password, $database);
        mysqli_query($this->link, "SET NAMES 'utf8'");
    }
    public function save($table, $data=[]){
        $query = "INSERT INTO $table SET name='$data[name]', age='$data[age]'";
        mysqli_query($this->link, $query) or die (mysqli_error($this->link));
    }
    public function del($table, $id){
        $query = "DELETE FROM $table WHERE id=$id";
        mysqli_query($this->link, $query) or die (mysqli_error($this->link));
    }
    public function delAll($table, $ids=[]){
        $query = "DELETE FROM $table WHERE ";
        for($i=0; $i<count($ids); $i++){
            if($i<count($ids)-1){
                $query .= "id=$ids[$i] or ";
            } else $query .="id=$ids[$i]";
        }
        mysqli_query($this->link, $query) or die (mysqli_error($this->link));
        mysqli_query($this->link, $query) or die (mysqli_error($this->link));
    }
    public function get($table, $id){
        $query = "SELECT * FROM $table WHERE id=$id";
        $res = mysqli_query($this->link, $query) or die (mysqli_error($this->link));
        return mysqli_fetch_assoc($res);
    }
    public function getAll($table, $ids=[]){
        $query = "SELECT * FROM $table WHERE ";
        for($i=0; $i<count($ids); $i++){
            if($i<count($ids)-1){
                $query .= "id=$ids[$i] or ";
            } else $query .="id=$ids[$i]";
        }
        $result = mysqli_query($this->link, $query) or die (mysqli_error($this->link));
        for($data=[]; $row = mysqli_fetch_assoc($result); $data[]=$row);
        return $data;
    }
    public function selectAll($table, $condition){
        $query = "SELECT * FROM $table WHERE $condition";
        $result = mysqli_query($this->link, $query) or die (mysqli_error($this->link));
        for($data=[]; $row = mysqli_fetch_assoc($result); $data[]=$row);
        return $data;
    }

}

$one = new DatabaseShell('localhost', 'root', '', 'mydb');

//$one->delAll('test', [3,4,5,6]);
//var_dump($one->get('test', 7));
//echo "<pre>";
//print_r($one->getAll('test', [7,8,9,10]));
//echo "</pre>";
echo "<pre>";
print_r($one->selectAll('test', "id > 10"));
echo "</pre>";