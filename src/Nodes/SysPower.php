<?php
/**
* SysPower is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyspower
*
* see class Node for details
*
*/
class SysPower extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.power';
        $this->validation_method = 'Bool';
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->converter = new ConverterBool;
    }
}