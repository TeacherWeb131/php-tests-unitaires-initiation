<?php

namespace Tests;

use App\Calculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    protected $instance;

    protected function setUp(): void
    {
        $this->instance = new Calculator();
    }

    /**
     * @dataProvider additionProvider
     */
    public function testAdditionInNormalSituation($x, $y, $resultatAttendu)
    {
        $this->assertEquals($resultatAttendu, $this->instance->addition($x, $y));
    }

    public function additionProvider()
    {
        return [
            [5, 5, 10],
            [3, 1, 4],
            [2.25, 2.35, 4.60],
            [5, -20, -15]
        ];
    }

    public function setUpInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Une des valeurs passées en paramètres n'est pas un nombre");
    }

    public function testAdditionWithBadParameters()
    {
        $this->setUpInvalidArgumentException();
        $this->instance->addition("bonjour", 12);
    }

    /**
     * @dataProvider soustractionProvider
     */
    public function testSoustractionInNormalSituation($x, $y, $expected)
    {
        $this->assertEquals($expected, $this->instance->soustraction($x, $y));
    }

    public function soustractionProvider()
    {
        return [
            [10, 5, 5],
            [0, 5, -5],
            [-5, -5, 0],
            [12.55, 0.55, 12]
        ];
    }

    public function testSoustractionWithBadParameters()
    {
        $this->setUpInvalidArgumentException();
        $this->instance->soustraction("bonjour", 12);
    }

    public function testDivisionInNormalSituation()
    {
        $this->assertEquals(5, $this->instance->division(10, 2));
    }

    public function testDivisionWithBadParameters()
    {
        $this->setUpInvalidArgumentException();
        $this->instance->division("bonjour", 12);
    }

    public function testDivisionByZeroThrowsException()
    {
        $this->expectException("App\Exception\DivisionByZeroException");
        $this->instance->division(100, 0);
    }
}
