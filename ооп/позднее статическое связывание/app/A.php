<?php

namespace app;


class A
{
    const TEST = "Class A";
    
    public function getTest1() {
        var_dump(self::TEST);
    }
    
    public function getTest2() {
        var_dump(static::TEST);
    }
}