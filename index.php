<?php
namespace MBNA;
require "vendor/autoload.php";
error_reporting(E_ERROR | E_PARSE);
$min = 0;
$max = 3999;

$options = 'g:p:';
$methods = array('g' => 'generate', 'p'=>'parse');
//print_r($argv);

$args = getopt($options);

print_r($args);

//input argument validation

$validation = validate_args ($args);


if ($validation['error']) {
	print $validation['message'];

	usage();
}



$RomanNumerals = new RomanNumerals();

echo call_user_func_array(array($RomanNumerals, $methods[array_keys($args)[0]]), array_values($args));











/****
*
* HELPER FUNCTIONS
***/


/**
* validates inputs and arguments
*/

function validate_args ($args) {
	//$error  = array('error'=>false, 'message' => '');
	$error 		= false;
	$message	= '';

	global $max, $min;

	if(empty($args)) {
		$error 		= true;
		$message	= "No Valid Inputs";
	}

	$keys = array_keys($args);

	switch ($keys[0]) {
		case 'g':
			if (!is_numeric($args['g']) || $args['g'] < $min || $args['g'] > $max) {
				$error 	= true;
				$message="-g supports only numbers between $min - $max";
			}
			break;
		case 'p':
			if (!is_string($args['p'])) {
				$error 	= true;
				$message="-p expects a Roman Numeral String";
			}
			break;	
		
		default:
			$error 	= true;
			$message= "Invalid Input -g[generate] or -p[parse] supported";
			break;
	}



	$error  = array('error'=>$error, 'message' => $message);

	return $error;
}

/**
* displays Usage
*/

function usage() {

	$str = "usage php index.php followed by :-\n
			-g number between 0-3999\n
			-p roman numeral\n CaSe SeNsiTiVe";

	die("\n $str\n");		

}