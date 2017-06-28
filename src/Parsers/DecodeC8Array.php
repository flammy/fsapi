<?php

namespace FSAPI\Parsers;

/**
* DecodeC8Array is decode-product for the Parser factory class
*
*/
class DecodeC8Array implements Parsers
{
    /**
     *  Converting an c8_array field from the resultset to a reasonable value
     *
     *  @param SimpleXMLElement $response - The Result returned by the doRequest Method of the Request Class
     *  
     *  @return mixed the encoded data
     *
     */
    public function parseResult($response)
    {
        return $response;
    }
}
