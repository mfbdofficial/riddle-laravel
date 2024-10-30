<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MathCalculation_withSomeNumber_returnsCalculationResultTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_sumNumbers(): void
    {
        $sumResult = 5 + 6 + 12;
        $this->assertEquals(23, $sumResult);
    }
}
