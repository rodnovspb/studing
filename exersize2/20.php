<?php

class ParentClass
{
    const A=22;
    const B = 7;
    const PI = self::A/self::B;
}

echo ParentClass::PI;