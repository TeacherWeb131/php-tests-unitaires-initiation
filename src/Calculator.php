<?php

namespace App;

use App\Exception\DivisionByZeroException;
use InvalidArgumentException;

class Calculator
{
    public function addition($x, $y)
    {
        $this->checkParameters($x, $y);
        return $x + $y;
    }

    public function soustraction($x, $y)
    {
        $this->checkParameters($x, $y);
        return $x - $y;
    }

    public function division($x, $y)
    {
        $this->checkParameters($x, $y);

        if ($y === 0) {
            throw new DivisionByZeroException();
        }
        return $x / $y;
    }

    protected function checkParameters($x, $y)
    {
        if (!is_numeric($x) || !is_numeric($y)) {
            throw new InvalidArgumentException("Une des valeurs passées en paramètres n'est pas un nombre");
        }
    }
}
