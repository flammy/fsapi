<?php
/**
* Parser is a decorator class for the factory class.
*
*/
class Parser implements Parsers
{
    /**
     * Converting a field from the resultset to the right datatype
     *
     *  This class determines the decode-method by passing the name of the Node to the factory class, which runs the matching parseResult method.
     *
     *  @var object SimpleXMLElement $result - The Result returned by the doRequest Method of the Request Class
     *
     *  @throws ParserException if the Request failed (!FS_OK), no matching Decoder was found or SimpleXMLElement is not present.
     *
     *  @return mixed the encoded data
     *
     */
    public function parseResult($result)
    {
        if (!class_exists('SimpleXMLElement')) {
            throw new ParserException(sprintf('SimpleXMLElement not found. please install php-xml'));
        }
        $xml = new SimpleXMLElement($result);
        if ($xml->status != 'FS_OK') {
            throw new ParserException(sprintf('Request Failed (FSAPI: %s).', $xml->status));
        }
        if (isset($xml->value)) {
            $Parser = new ParserFactory();
            return $Parser->parseResult($xml->value);
        }
        if (isset($xml->sessionId)) {
            $Parser = new ParserFactory();
            return $Parser->parseResult($xml->sessionId);
        }
        $Parser = new DecodeList();
        return $Parser->parseResult($xml->item);
    }
}
