<?php
namespace Bowling;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use http\Exception\BadConversionException;

include "Game.php";

$game = new Game();

$game->roll(10); // strike

$game->roll(5);
$game->roll(2);
$game->roll(7);
$i = $game->score();
echo Game::CONSTANT . "\n";
echo "<p> The Score: ".$game->score . "</p>";
echo $game->var . "\n";

//echo '<p class="paragraph'.$new_game->score().'"></p>';

class MyClass
{
    const CONSTANT = 'constant value';

    function showConstant() {
        echo  self::CONSTANT . "\n";
    }
}

echo MyClass::CONSTANT . "\n";

$classname = "MyClass";
//echo $classname::CONSTANT . "\n";

$class = new MyClass();
$class->showConstant();

echo $class::CONSTANT."\n";
