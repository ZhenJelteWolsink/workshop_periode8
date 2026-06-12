<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\Calculator;
use InvalidArgumentException;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        // Deze methode wordt vóór elke test uitgevoerd.
        // Hier maken we één keer een nieuwe Calculator aan
        // zodat elke test met een "schone" situatie begint.
        $this->calculator = new Calculator();
    }

    /* =========================
     * BASIC OPERATIONS
     * ========================= */

    public function testAdd()
    {
        // Arrange
        $a = 5;
        $b = 3;

        // Act
        $result = $this->calculator->add($a, $b);

        // Assert
        $this->assertEquals(8, $result);
    }

    public function testAddWithNegativeNumbers()
    {
        // Arrange
        $a = -5;
        $b = -3;

        // Act
        $result = $this->calculator->add($a, $b);

        // Assert
        $this->assertEquals(-8, $result);
    }

    public function testSubtract()
    {
        // Arrange
        $a = 10;
        $b = 4;

        // Act
        $result = $this->calculator->subtract($a, $b);

        // Assert
        $this->assertEquals(6, $result);
    }

    public function testMultiply()
    {
        // Arrange
        $a = 6;
        $b = 7;

        // Act
        $result = $this->calculator->multiply($a, $b);

        // Assert
        $this->assertEquals(42, $result);
    }

    public function testMultiplyWithZero()
    {
        // Arrange
        $a = 9;
        $b = 0;

        // Act
        $result = $this->calculator->multiply($a, $b);

        // Assert
        $this->assertEquals(0, $result);
    }

    public function testDivide()
    {
        // Arrange
        $a = 20;
        $b = 4;

        // Act
        $result = $this->calculator->divide($a, $b);

        // Assert
        $this->assertEquals(5, $result);
    }

    public function testDivideByZeroThrowsException()
    {
        // Arrange
        $a = 10;
        $b = 0;

        $this->expectException(InvalidArgumentException::class);

        // Act
        $this->calculator->divide($a, $b);
    }

    /*
     * OPDRACHT:
     * Maak hieronder een test voor:
     * - optellen met negatieve getallen
     *
     * Denk aan:
     * - Arrange
     * - Act
     * - Assert
     */

    /*
     * OPDRACHT:
     * Maak een test voor subtract().
     * Test een normale situatie (bijvoorbeeld 10 - 4).
     */

    /*
     * OPDRACHT:
     * Maak een test voor multiply().
     * Test:
     * - een normale vermenigvuldiging
     * - vermenigvuldigen met 0
     */

    /*
     * OPDRACHT:
     * Maak een test voor divide().
     * Test:
     * - een normale deling
     * - delen door 0 moet een InvalidArgumentException geven
     *
     * Tip voor exception test:
     * $this->expectException(InvalidArgumentException::class);
     */

    /* =========================
     * POWER
     * ========================= */

    /*
     * OPDRACHT:
     * Maak een test voor power().
     * Test:
     * - 2 tot de macht 3
     * - exponent 0 (uitkomst moet 1 zijn)
     */

    public function testPower()
    {
        // Arrange
        $base = 2;
        $exponent = 3;

        // Act
        $result = $this->calculator->power($base, $exponent);

        // Assert
        $this->assertEquals(8, $result);
    }

    public function testPowerWithZeroExponent()
    {
        // Arrange
        $base = 5;
        $exponent = 0;

        // Act
        $result = $this->calculator->power($base, $exponent);

        // Assert
        $this->assertEquals(1, $result);
    }

    /* =========================
     * PERCENTAGE
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor percentage().
     * Test:
     * - 10% van 200
     * - 0%
     * - een percentage boven de 100%
     */

    public function testPercentageTenOfTwoHundred()
    {
        // Arrange
        $total = 200;
        $percentage = 10;

        // Act
        $result = $this->calculator->percentage($total, $percentage);

        // Assert
        $this->assertEquals(20, $result);
    }

    public function testPercentageZero()
    {
        // Arrange
        $total = 200;
        $percentage = 0;

        // Act
        $result = $this->calculator->percentage($total, $percentage);

        // Assert
        $this->assertEquals(0, $result);
    }

    public function testPercentageAboveHundred()
    {
        // Arrange
        $total = 200;
        $percentage = 150;

        // Act
        $result = $this->calculator->percentage($total, $percentage);

        // Assert
        $this->assertEquals(300, $result);
    }

    /* =========================
     * AVERAGE
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor average().
     * Test:
     * - gemiddelde van 2 getallen
     * - gemiddelde van meerdere getallen
     * - lege array moet een exception geven
     */

    public function testAverageTwoNumbers()
    {
        // Arrange
        $numbers = [4, 6];

        // Act
        $result = $this->calculator->average($numbers);

        // Assert
        $this->assertEquals(5, $result);
    }

    public function testAverageMultipleNumbers()
    {
        // Arrange
        $numbers = [2, 4, 6, 8];

        // Act
        $result = $this->calculator->average($numbers);

        // Assert
        $this->assertEquals(5, $result);
    }

    public function testAverageEmptyArrayThrowsException()
    {
        // Arrange
        $numbers = [];

        $this->expectException(InvalidArgumentException::class);

        // Act
        $this->calculator->average($numbers);
    }

    /* =========================
     * HIGHEST
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor highest().
     * Test:
     * - normale getallen
     * - negatieve getallen
     */

    public function testHighestWithNormalNumbers()
    {
        // Arrange
        $numbers = [1, 9, 3, 7];

        // Act
        $result = $this->calculator->highest($numbers);

        // Assert
        $this->assertEquals(9, $result);
    }

    public function testHighestWithNegativeNumbers()
    {
        // Arrange
        $numbers = [-5, -2, -9, -1];

        // Act
        $result = $this->calculator->highest($numbers);

        // Assert
        $this->assertEquals(-1, $result);
    }

    /* =========================
     * LOWEST
     * ========================= */

    /*
     * OPDRACHT:
     * Maak tests voor lowest().
     * Test:
     * - normale getallen
     * - decimalen
     */

    public function testLowestWithNormalNumbers()
    {
        // Arrange
        $numbers = [4, 2, 9, 6];

        // Act
        $result = $this->calculator->lowest($numbers);

        // Assert
        $this->assertEquals(2, $result);
    }

    public function testLowestWithDecimals()
    {
        // Arrange
        $numbers = [2.5, 3.1, 1.2, 4.0];

        // Act
        $result = $this->calculator->lowest($numbers);

        // Assert
        $this->assertEquals(1.2, $result);
    }
}
