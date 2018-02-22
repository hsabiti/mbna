<?php
declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use MBNA\RomanNumerals;

final class RomanNumeralsGenerateTest extends TestCase
{
    public function testCanBeGeneratedFromValidNumeral(): void
    {
    	error_reporting(E_ERROR | E_PARSE);
        $RN = new RomanNumerals();

		$this->assertEquals(
            'MMXCVII',
            $RN->generate('2097')
        );
        
    }
    public function testCannotBeGeneratedFromInValidNumeral(): void
    {
        $RN = new RomanNumerals();

		$this->expectException(InvalidArgumentException::class);
        
        $RN->generate('MBNA');
        
    }
}