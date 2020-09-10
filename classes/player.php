<?php

class player
{
    public $name;
    public $health;
    public $damage;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setAttributes($attributes) {

    foreach ($attributes as $i => $attribute) {
        if ($i = 1) {
            $this->health = $attributes[$i];
        }
        if ($i = 2){
            $this->damage = $attributes[$i];
        }
    }
}

    public function attack($roll){
        echo "<br>You attack the monster! ";

        $damageDealt = round($this->damage / 6 * $roll);

        echo "<br>You damage the monster for " . $damageDealt;

        return $damageDealt;
    }

    public function takeDamage($damage){
        $this->health -= $damage;
    }
}
