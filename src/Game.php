<?php

namespace GameOfLife;

class Game
{
    private $universe;
    private $generation;
    private $dimensionX;
    private $dimensionY;
    private $history = 0;

    public function createUniverse($generation, $dimensionX, $dimensionY) {
        $this->universe = new Universe($generation, $dimensionX, $dimensionY);
        $this->generation = $generation;
        $this->dimensionX = $dimensionX;
        $this->dimensionY = $dimensionY;
    }

    public function getUniverse()
    {
        return $this->universe;
    }

    public function setCells($cells)
    {
        foreach ($cells as $cell) {
            $this->universe->setCell($cell);
        }
    }

    public function checkRule()
    {
        $rule = new Rule();
        $this->history ++;
        $newUniverse = new Universe($this->generation . " " . $this->history, $this->dimensionX, $this->dimensionY);
        $rule->checkCells($this->getUniverse(), $newUniverse);
        $this->universe = $newUniverse;
    }
}
