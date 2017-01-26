<?php
/**
* ParserFactory is a factory class which produces decoders for the parser
*
*/
class ParserFactory implements Parsers
{
    /**
     * Converting a field from the resultset to the right datatype
     *
     *  This method determines the decode-class by the name of the Node and runs the matching parseResult method.
     *
     *  @param SimpleXMLElement $result - The Result returned by the doRequest Method of the Request Class
     *
     *  @throws ParserException if no matching Decoder was found.
     *
     *  @return mixed the encoded data
     *
     */
    public function parseResult($result)
    {
        foreach ($result->children() as $child) {
            $method =  explode('_', $child->getname());
    	    if(!is_array($method)){
    		  $method['S32'] = "S32";
    	    }else{
                foreach ($method as $k => $v) {
                    $method[$k] = ucfirst($v);
                }
    	    }
            $method = 'Decode'.implode('', $method);
            if (!class_exists($method)) {
                throw new ParserException(sprintf('Unknown data type. Parser Decode%s not found.', $method));
            }
            $Parser = new $method;
            return $Parser->parseResult($child);
        }
    }
}
