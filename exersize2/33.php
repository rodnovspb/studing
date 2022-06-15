<?php



class Count {
    static int $count = 0;
    public static function increment(){
        self::$count++;
    }
}

Count::increment();
Count::increment();
Count::increment();
Count::increment();
echo Count::$count;