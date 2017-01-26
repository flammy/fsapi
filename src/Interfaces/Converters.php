<?php
interface Converters
{


    /**
     * Converts the input from human readable to internal format
     * @param $input
     * @return
     */

    public function convertInput($input);

    /**
     * Converts the input from human readable to internal format
     * @param $output
     * @return
     */
    public function convertOutput($output);

}
