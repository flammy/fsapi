<?php
interface Validators
{
    /**
     * validates the input before sending it to the radio
     * @param $input
     * @return
     */

    public function validateInput($input);
}
