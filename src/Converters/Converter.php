<?php

namespace FSAPI\Converters;

/**
* ConverterEqs is converter method used by the converter class
*
*/
class Converter implements Converters
{
	protected $translation_table = array();
	
	public function __construct(){

	}
	
	public function setTranslationTable($translation_table){
		$this->translation_table = $translation_table;
	}
	
    public function convertInput($input)
    {
		$translation_table = $this->translation_table;
		$key = array_search(trim($input),$translation_table);
		if($key !== false){
			return $translation_table[$key];
		}
		return $input;
    }
	
    public function convertOutput($output)
    {
		$translation_table = $this->translation_table;

		if(isset($translation_table[trim($output)])){
			return $translation_table[trim($output)];
		
		}
		return $output;
    }
}
