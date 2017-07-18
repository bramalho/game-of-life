<?php

include "vendor/autoload.php";

$game = new \GameOfLife\Game();

$game->createUniverse("The Great Game Of Life", 10, 10);
//$game->getUniverse()->initUniverse(true);

$game->setCells([
    new \GameOfLife\Cell(1,2),
    new \GameOfLife\Cell(2,2),
    new \GameOfLife\Cell(3,2)
]);

$game->getUniverse()->printUniverse();

for ($i = 0; $i < 1000; $i++) {
    system('clear');
    $game->checkRule();
    $game->getUniverse()->printUniverse();
    sleep(1);
}
