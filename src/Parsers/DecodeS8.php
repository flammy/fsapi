<?php

namespace FSAPI\Parsers;

/**
* DecodeS8 is decode-product for the Parser factory class
*
*/
class DecodeS8 implements Parsers
{
    /**
     *  Converting an s8 coded field from the resultset to a reasonable value
     *
     *  @param SimpleXMLElement $result - The Result returned by the doRequest Method of the Request Class
     *  
     *  @return mixed the encoded data
     *
     */
    public function parseResult($result)
    {
        return (float) $result;
    }
}
