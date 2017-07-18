<?php

namespace GameOfLife;

use GameOfLife\Enums\CellEnum;

class Cell
{
    private $x;
    private $y;
    private $status;
    private $type;

    public function __construct($x, $y, $status = CellEnum::ALIVE)
    {
        $this->x = $x;
        $this->y = $y;
        $this->status = $status;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setY($y)
    {
        $this->y = $y;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function isAlive()
    {
        return $this->status === CellEnum::ALIVE;
    }

    public function live()
    {
        $this->status = CellEnum::ALIVE;
    }

    public function clear()
    {
        $this->status = CellEnum::DEAD;
    }
}
