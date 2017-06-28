<?php

namespace FSAPI\Converters;

/**
* ConverterList is converter method used by the converter class
*
*/
class ConverterList extends Converter implements Converters
{
	
	public function __construct(){
		
	}
	
	public function setTranslationTable($translation_table){
		$new_table = array();
		foreach($translation_table as $k => $v){
			$new_table[$v['label']] = $k;
		}
		$this->translation_table = $new_table;
	}
	
	
	
}
