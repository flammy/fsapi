<?php
/**
* DecodeU32 is decode-product for the Parser factory class
*
*/
class DecodeU32 implements Parsers
{
    /**
     *  Converting an U32 coded field from the resultset to a reasonable value
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
