<?php

namespace GameOfLife;

class Rule
{
    public function checkCells(Universe $original, Universe $universe)
    {
        for ($x = 0; $x < $universe->getDimensionX(); $x++) {
            for ($y = 0; $y < $universe->getDimensionY(); $y++) {
                $cell = $universe->getCellByPosition($x, $y);

                $neighbor = 0;
				if ($original->getCellByPosition($x - 1, $y - 1)->isAlive()) {
				    $neighbor++;
				}
				if ($original->getCellByPosition($x - 1, $y)->isAlive()) {
				    $neighbor++;
				}
				if ($original->getCellByPosition($x - 1, $y + 1)->isAlive()) {
				    $neighbor++;
				}
				if ($original->getCellByPosition($x, $y - 1)->isAlive()) {
				    $neighbor++;
				}
				if ($original->getCellByPosition($x, $y + 1)->isAlive()) {
				    $neighbor++;
				}
				if ($original->getCellByPosition($x + 1, $y - 1)->isAlive()) {
				    $neighbor++;
				}
				if ($original->getCellByPosition($x + 1, $y)->isAlive()) {
				    $neighbor++;
				}
                if ($original->getCellByPosition($x + 1, $y + 1)->isAlive()) {
                    $neighbor++;
                }

				if ($original->getCellByPosition($x, $y)->isAlive() && ($neighbor < 2 && $neighbor > 3)) {
                    $cell->clear();
				}
				else if ($original->getCellByPosition($x, $y)->isAlive() && ($neighbor == 2 || $neighbor == 3)) {
				    $cell->live();
                }
                else if (!$original->getCellByPosition($x, $y)->isAlive() && $neighbor == 3) {
                    $cell->live();
                }
            }
        }
    }
}
