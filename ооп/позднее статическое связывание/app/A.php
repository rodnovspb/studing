<?php

namespace app;


class A
{
    const TEST = "Class A";
    
    public function getTest() {
        var_dump(self::TEST);
    }
    
}