<?php

class User {
    private $name;
    private $surname;
    private $patronymic;
    function __toString()
    {
        return "$this->name $this->patronymic $this->surname";
    }

    function __construct($name, $surname, $patronymic)
    {
        $this->name=$name;
        $this->surname=$surname;
        $this->patronymic=$patronymic;
    }
}

$one = new User('Den', 'Rodnov', 'Anatolyevich');

echo $one;