<?php
namespace MBNA;
/**
 * @package     RomanNumerals
 * @author      Henry Sabiti
 */

interface RomanNumeralsInterface  {
	public function generate($integer); // Converts from integer to numeral
	public function parse($string); // Converts from numeral to integer
}
