<?php

namespace Project\Controllers;
use Core\Controller;

class UserController extends Controller {
    private $users;
    public function __construct()
    {
        $this->users = [
            1 => ['name'=>'user1', 'age'=>'23', 'salary' => 1000],
            2 => ['name'=>'user2', 'age'=>'24', 'salary' => 2000],
            3 => ['name'=>'user3', 'age'=>'25', 'salary' => 3000],
            4 => ['name'=>'user4', 'age'=>'26', 'salary' => 4000],
            5 => ['name'=>'user5', 'age'=>'27', 'salary' => 5000],
        ];
    }
    public function show($params){
        var_dump($this->users[$params['id']]);
    }
    public function info($params){
        var_dump($this->users[$params['id']][$params['key']]);
    }
    public function all(){
        $data = "<table><tr><th>Имя</th><th>Возраст</th><th>Зарплата</th></tr>";
        foreach ($this->users as $user){
            $data .= "<tr><td>$user[name]</td><td>$user[age]</td><td>$user[salary]</td></tr>";
        }
        $data .= "</table>";
        echo $data;
    }
    public function first($params){
        $params['n'] = (int)abs($params['n']);
        $num = $params['n'] <= count($this->users) ? $params['n'] : count($this->users);
        $data = "<table><tr><th>Имя</th><th>Возраст</th><th>Зарплата</th></tr>";
        for($i=1; $i<=$num; $i++){
            $data .= "<tr><td>{$this->users[$i]['name']}</td><td>{$this->users[$i]['age']}</td><td>{$this->users[$i]['salary'
            ]}</td></tr>";
        }
        $data .= "</table>";
        echo $data;
    }
}