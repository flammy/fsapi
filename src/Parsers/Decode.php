<?php

namespace FSAPI\Parsers;

class Decode implements Parsers{
    public function parseResult($result){
        //return $result->getname();
        foreach($result->children() as $child){
        $method =  explode('_',$child->getname());
        foreach($method as $k => $v){
            $method[$k] = ucfirst($v);
        }
        $method = 'Decode'.implode('',$method);
        if(!class_exists($method)){
            throw new ParserException(sprintf('Unknown data type. Parser Decode%s not found.',$method));
        }
        $Parser = new $method;
        return $Parser->parseResult($child);
        }
    }
}