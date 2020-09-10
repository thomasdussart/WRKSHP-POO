<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>PHP POO WORKSHOP</title>

</head>

<body>
	<?php

	include "./classes/dice.php";
	include "./classes/monster.php";
	include "./classes/player.php";

	function pause($x)
	{
		ob_flush();
		flush();
		sleep($x);
	}


	$dice = new dice;

	$player1 = new player("Thomas");
	$player1->setAttributes($dice->rollAttributes());

	echo "<br>You have begun your journey, " . $player1->name;
	echo "<br>Your stats are: <br>Health: " . $player1->health . "<br>Damage: " . $player1->damage;
	pause(3);
	echo "<br>You enter the forest";
	pause(2);

	$monster1 = new monster;
	$monster1->setAttributes($dice->rollAttributes());
	pause(1);
	echo "<br>The monster stats are: <br>Health: " . $monster1->health . "<br>Damage: " . $monster1->damage;
	pause(3);

	while (($player1->health > 0) && ($monster1->health > 0)) {
		$damage = $monster1->attack($dice->roll());
		$player1->takeDamage($damage);
		pause(2);
		echo "<br>Your health is now " . $player1->health;
		pause(2);

		if ($player1->health <= 0) {
			echo "<br>Your brave endeavours have come ton an end, " . $player1->name
				. "<br>Would you like to play again? <a href='#' onClick='window.location.reload()''>Yes</a>";
			break;
		}

		$damage = $player1->attack($dice->roll());
		$monster1->takeDamage($damage);
		pause(2);
		echo "<br>The monster health is now: " . $monster1->health;
		pause(2);

		if ($monster1->health <= 0) {
			echo "<br>You have vanquished the beast " . $player1->name . ".<br>You can now return to your village."
				. "<br>Would you like to play again? <a href='#' onClick='window.location.reload()''>Yes</a>";
			break;
		}
	}

	?>



</body>

</html>