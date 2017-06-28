<?php

namespace FSAPI\Parsers;

/**
* DecodeU8 is decode-product for the Parser factory class
*
*/
class DecodeU8 implements Parsers
{
    /**
     *  Converting an U8 coded field from the resultset to a reasonable value
     *
     *  @var SimpleXMLElement $result - The Result returned by the doRequest Method of the Request Class
     *  
     *  @return mixed the encoded data
     *
     */
    public function parseResult($result)
    {
        return (float) $result;
    }
}
