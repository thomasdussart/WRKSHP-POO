<?php

class monster
{
    public $health;
    public $damage;

    public function __construct()
    {
        echo  "<br>A monster has appeared!";
    }

    public function setAttributes($attributes)
    {

        foreach ($attributes as $i => $attribute) {
            if ($i = 1) {
                $this->health = $attributes[$i];
            }
            if ($i = 2) {
                $this->damage = $attributes[$i];
            }
        }
    }

    public function attack($roll)
    {
        echo "<br>The monster attacks! ";

        $damageDealt = round($this->damage / 6 * $roll);

        echo "<br>The monster damages you for " . $damageDealt;

        return $damageDealt;
    }

    public function takeDamage($damage)
    {
        $this->health -= $damage;
    }
}
