<?php

namespace FSAPI\Request;

interface Requests
{
    /**
     * makes an request to the radio
     * @param string $method
     * @param string $node
     * @param array $attributes
     * @param string $delimiter
     * @return
     */

    public function doRequest($method, $node = null, $attributes = array(), $delimiter = "");
}
