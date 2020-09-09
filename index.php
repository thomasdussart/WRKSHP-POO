<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>PHP POO WORKSHOP</title>
	<link rel="icon" type="image" href="img/dice.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>



	<?php

	$classes = array("monster", "player", "dice",);
	foreach ($classes as $i => $class) {
		include "classes/" . $classes[$i] . ".php";
	}

	function pause($x)
	{
		ob_flush();
		flush();
		sleep($x);
	}



	// Create dice object

	$dice = new dice;


	// Creates player with attributes

	$player1 = new player("Thomas");
	$player1->setAttributes($dice->rollAttributes());


	// Set the scene

	echo "<br>You have begun your journey, " . $player1->name;
	echo "<br>Your stats are: <br>Health: " . $player1->health . "<br>Damage: " . $player1->damage;
	pause(3);
	echo "<br>You enter a forest";
	pause(2);


	// Create monster

	$monster1 = new monster;
	$monster1->setAttributes($dice->rollAttributes());
	pause(1);
	echo "<br>The monster's stats are: <br>Health: " . $monster1->health . "<br>Damage: " . $monster1->damage;
	pause(3);


	// Attack sequence

	while (($player1->health > 0) && ($monster1->health > 0)) {

		$damage = $monster1->attack($dice->roll());
		$player1->takeDamage($damage);
		pause(2);
		echo "<br>Your health is now: " . $player1->health;
		pause(2);

		if ($player1->health <= 0) {
			echo "<br>Your brave endeavours have come to an end, " . $player1->name
				. "<br> Would you like to play again? <a href='#' onClick='window.location.reload()''>yes</a>";
			break;
		}

		$damage = $player1->attack($dice->roll());
		$monster1->takeDamage($damage);
		pause(2);
		echo "<br>The monster's health is now: " . $monster1->health;
		pause(2);

		if ($monster1->health <= 0) {
			echo "<br>You have vanquished the beast, " . $player1->name . ".<br>You can now return to your village."
				. "<br> Would you like to play again? <a href='#' onClick='window.location.reload()''>yes</a>";
			break;
		}
	}




	?>

</body>

</html>