<?php
/**
* ConverterDatetime is converter method used by the converter class
*
*/
class ConverterDateTime implements Converters
{

	
    public function convertInput($input)
    {
		$ts = strtotime($input);
		return date('c',$ts);
    }
	
    public function convertOutput($output)
    {
		$ts = strtotime($output);
		if(strlen($output) < 8){
			return date("H:i:s",$ts);
		}else{
			return date("Y-m-d",$ts);
		}
    }
}
