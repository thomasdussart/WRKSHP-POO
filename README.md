# PHP POO WORKSHOP

For this workshop, you'll need an apache server for running PHP files.

[XAMPP](https://www.apachefriends.org/fr/download.html)

### Inside _classes_ folder

**dice.php**

```
<?php

class dice
{
	public function roll()
	{
		return rand(1, 6);
	}

	public function rollAttributes()
	{

		$healthStart = 10;
		$damageStart = 10;

		$blank = NULL;
		$health = $healthStart + ($this->roll() * 5);
		$damage = $damageStart + ($this->roll() * 2);
		$attributes = array($blank, $health, $damage);
		return $attributes;
	}
}
```

**monster.php**

```
<?php

class monster{

			public $health;
			public $damage;

	public function __construct(){
		echo "<br>A monster has appeared!";
	}

	public function setAttributes($attributes){

		foreach ($attributes  as $i => $attribute){
			if ($i = 1){
				$this->health = $attributes[$i];
			}
			if ($i = 2){
				$this->damage = $attributes[$i];
			}

		}

	}

	public function attack($roll){
		echo "<br>The monster attacks! ";

		$damageDealt =  round($this->damage / 6 * $roll);

		echo "<br>The monster damages you for " . $damageDealt;

		return $damageDealt;

	}

	public function takeDamage($damage){
		$this->health -= $damage;
	}

}


?>

```

**player.php**

```
<?php


class player{

			public $name;
			public $health;
			public $damage;

	public function __construct($name){
			$this->name = $name;

	}


	public function setAttributes($attributes){

		foreach ($attributes  as $i => $attribute){
			if ($i = 1){
				$this->health = $attributes[$i];
			}
			if ($i = 2){
				$this->damage = $attributes[$i];
			}

		}

	}


	public function attack($roll){
		echo "<br>You attack the monster! ";

		$damageDealt =  round($this->damage / 6 * $roll);

		echo "<br>You damage the monster for " . $damageDealt;

		return $damageDealt;

	}


	public function takeDamage($damage){
		$this->health -= $damage;
	}
}


?>
```
