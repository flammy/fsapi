<?php

namespace FSAPI\Converters;

/**
* ConverterBool is converter method used by the converter class
*
*/
class ConverterBool extends Converter implements Converters
{
	
	public function __construct(){
		$this->translation_table = array(
            0 => 'off',
            1 => 'on'
		);
	}
}
