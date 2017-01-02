<?php
/**
* ConverterControl is converter method used by the converter class
*
*/
class ConverterControl extends Converter implements Converters
{
	
	public function __construct(){
		$this->translation_table = array(
            0 => 'stop',
            1 => 'play',
            2 => 'pause',
            3 => 'next',
            4 => 'previous'
		);
	}
}
