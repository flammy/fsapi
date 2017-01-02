<?php
interface Converters
{
	
	
    /**
     * Converts the input from human readable to internal format
     */

    public function convertInput($input);
	
    /**
     * Converts the input from human readable to internal format
     */
    public function convertOutput($output);

}
