<?php

namespace FSAPI\Nodes;

/**
* SysLang is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyslang
*
* see class Node for details
*
*/
class SysLang extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.lang';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}