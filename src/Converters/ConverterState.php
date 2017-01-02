<?php
/**
* ConverterState is converter method used by the converter class
*
*/
class ConverterState extends Converter implements Converters
{
	
	public function __construct(){
		$this->translation_table = array(
            0 => 'stopped',
            1 => 'loading',
            2 => 'playing',
            3 => 'paused',
            4 => 'buffering',
            5 => 'unknown'
		);
	}
}
