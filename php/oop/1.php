<?php

class Date {
    public $year;
    public $month;
    public $day;
    function __construct($year, $month, $day)
    {
        $this->year=$year;
        $this->month=$month;
        $this->day=$day;
    }
    function __get($name)
    {
        if($name=='weekDay') return date('w', mktime(0,0,0, $this->month, $this->day, $this->year));
    }
}

$day = new Date(2022, 4, 8);
echo $day->weekDay;