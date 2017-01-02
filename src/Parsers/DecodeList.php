<?php
/**
* DecodeList is decode-product for the Parser factory class
*
*/
class DecodeList implements Parsers
{
    /**
     *  Converting an list coded field from the resultset to a reasonable value
     *
     *  @var object SimpleXMLElement $result - The Result returned by the doRequest Method of the Request Class
     *  
     *  @return mixed the encoded data
     *
     */
    public function parseResult($response)
    {

        $result = array();
        foreach($response->item as $item){
             $result = $this->parseElement($item,$result);
        }
        return $result;
    }

    private function parseElement($element,$result){
        $parser = new DecodeC8Array();
        $elem_array = (array) $element;
        if(isset($elem_array['@attributes'])){
            if(isset($elem_array['@attributes']['key'])){
                $key = $elem_array['@attributes']['key'];
                if(!isset($result[$key])){
                     $result[$key] = array();
                }
                foreach($element->field as $field){
                    $result[$key] = $this->parseElement($field,$result[$key]);
                }
            }
            if(isset($elem_array['@attributes']['name'])){
                $name = $elem_array['@attributes']['name'];
                $elem = next($elem_array);
                $result[$name] = $parser->parseResult($elem );
            }
        }
        return $result;
    }

}


