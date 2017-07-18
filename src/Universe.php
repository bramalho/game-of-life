<?php

namespace GameOfLife;

class Universe
{
    private $generation;
    private $dimensionX;
    private $dimensionY;
    private $cells = array();

    public function __construct($generation, $x, $y)
    {
        $this->generation = $generation;
        $this->dimensionX = $x;
        $this->dimensionY = $y;
        $this->initUniverse();
    }

    public function getGeneration()
    {
        return $this->generation;
    }

    public function getDimensionX()
    {
        return $this->dimensionX;
    }

    public function getDimensionY()
    {
        return $this->dimensionY;
    }

    public function initUniverse($rand = false)
    {
        for ($x = 0; $x < $this->dimensionX; $x++) {
            for ($y = 0; $y < $this->dimensionY; $y++) {
                $this->cells[$x][$y] = new Cell($x, $y, $rand ? rand(0, 1) : 0);
            }
        }
    }

    public function setCell(Cell $cell)
    {
        $this->cells[$cell->getX()][$cell->getY()] = $cell;
    }

    public function getCells()
    {
        return $this->cells;
    }

    public function getCellByPosition($x, $y)
    {
        return isset($this->cells[$x][$y]) ? $this->cells[$x][$y] : new Cell($x, $y, 0);
    }

    public function printUniverse()
    {
        echo $this->getGeneration() . "\n";
        for ($x = 0; $x < $this->dimensionX; $x++) {
            for ($y = 0; $y < $this->dimensionY; $y++) {
                echo "\e[37m[\e[0m";
                echo $this->getCellByPosition($x, $y)->isAlive() ? "\033[31m*\033[0m" : " ";
                echo "\e[37m]\e[0m";
            }
            echo "\n";
        }
    }
}
