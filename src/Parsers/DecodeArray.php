<?php
/**
* DecodeArray is decode-product for the Parser factory class
*
*/
class DecodeArray implements Parsers
{
    /**
     *  Converting an array field from the resultset to a reasonable value
     *
     *  @var object SimpleXMLElement $result - The Result returned by the doRequest Method of the Request Class
     *  
     *  @return mixed the encoded data
     *
     */
    public function parseResult($result)
    {
        return pack('H*', $result);
    }
}
