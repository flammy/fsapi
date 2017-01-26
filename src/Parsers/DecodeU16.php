<?php
/**
* DecodeU16 is decode-product for the Parser factory class
*
*/
class DecodeU16 implements Parsers
{
    /**
     *  Converting an u16 coded field from the resultset to a reasonable value
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
