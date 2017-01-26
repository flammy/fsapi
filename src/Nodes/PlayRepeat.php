<?php
/**
* PlayRepeat is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayrepeat
*
* see class Node for details
*
*/
class PlayRepeat extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.repeat';
        $this->validation_method = 'Bool';
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->converter = new ConverterBool;
        $this->api_level = 1;
    }
}