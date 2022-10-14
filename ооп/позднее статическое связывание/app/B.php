<?php


namespace app;


class B extends A
{

    const TEST = 'Class B';
    
    public function getTest() {
        var_dump(self::TEST);
    }

}