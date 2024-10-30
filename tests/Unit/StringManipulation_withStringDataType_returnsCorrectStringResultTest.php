<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class StringManipulation_withStringDataType_returnsCorrectStringResultTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_concatinationAbility(): void
    {
        $myName = 'Muhammad';
        $myName .= ' Fajar' . ' Budi';
        $this->assertEquals('Muhammad Fajar Budi', $myName);
        $myName .= ' Dharmawan';
        $this->assertEquals('Muhammad Fajar Budi Dharmawan', $myName);
    }

    public function test_converNumberIntoString()
    {
        $number = 12345;
        $stringOfNumber = strval($number);
        $this->assertEquals('12345', $stringOfNumber);
    }
}
