<?php

namespace FSAPI\Converters;

/**
* ConverterIP is converter method used by the converter class
*
*/
class ConverterIP implements Converters
{

	
    public function convertInput($input)
    {
		if(is_numeric($input)){
			return $input;
		}
		return ip2long($input);
    }
	
    public function convertOutput($output)
    {
		if(!is_numeric($output)){
			return $output;
		}
		return long2ip($output);
    }
}
