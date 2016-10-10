<?php
interface Requests
{
    /**
     * makes an request to the radio
     *
     */

    public function doRequest($method, $node = null, $attributes = array(), $delimiter = "");
}
