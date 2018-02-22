<?php
namespace MBNA;
require_once "RomanNumeralsInterface.php";
/**
 * @package     RomanNumerals
 * @author      Henry Sabiti
 */
class RomanNumerals implements RomanNumeralsInterface {
	/**
     * Class constructor
     *
     * @param       array $args  
     * @return      void
     */
    public function __construct($args=[])
    {
    	
	}

	/**
     * @param       $interger    
     * @return      string Roman Numberal
     */
    public function generate($interger)
    {
    	 if(!is_numeric($interger))	{
    		throw new \InvalidArgumentException('Invalid Input: '. $interger);
    	}
    	
    	$N = $interger;


    	$c='IVXLCDM';
        for($a=5,$b=$s='';$N;$b++,$a^=7)
                for($o=$N%$a,$N=$N/$a^0;$o--;$s=$c[$o>2?$b+$N-($N&=-2)+$o=1:$b].$s);

         return $s;       	
	}

	/**
     * @param       $string    
     * @return      integer Arabic Numberal
     */
    public function parse($string)
    {
    	if(!is_string($string))	{
    		throw new \InvalidArgumentException('Invalid Input: '. $string);
    	}

    	$string = strtoupper($string);
    	

    	$return =0;

    	$map = array(
		    'M' 	=> 1000,
		    'CM' 	=> 900,
		    'D' 	=> 500,
		    'CD' 	=> 400,
		    'C' 	=> 100,
		    'XC' 	=> 90,
		    'L' 	=> 50,
		    'XL' 	=> 40,
		    'X' 	=> 10,
		    'IX' 	=> 9,
		    'V' 	=> 5,
		    'IV' 	=> 4,
		    'I' 	=> 1,
		);

		foreach ($map as $key => $value) {
			while (strpos($string, $key) === 0) {
		        $return += $value;
		        $string = substr($string, strlen($key));
		    }
		}

		return $return;

	}


}