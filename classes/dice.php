<?php

class dice
{
    public function roll()
    {
        return rand(1, 6);
    }


    public function rollAttributes()
    {
        $healthstart = 10;
        $damageStart = 10;

        $blank = NULL;
        $health = $healthstart + ($this->roll() * 5);
        $damage = $damageStart + ($this->roll() * 2);
        $attributes = array($blank, $health, $damage);
        return $attributes;
    }
}
