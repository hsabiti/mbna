<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use MBNA\RomanNumerals;

final class RomanNumeralsParseTest extends TestCase
{
    public function testCanBeParsedFromValidRomanNumeral(): void
    {
        $RN = new RomanNumerals();

		$this->assertEquals(
            97,
            $RN->parse('XCVII')
        );
        
    }
    public function testCannotBeParsedFromInValidRomanNumeral(): void
    {
        $RN = new RomanNumerals();

		$this->expectException(InvalidArgumentException::class);
        
        $RN->parse(97);
        
    }
}