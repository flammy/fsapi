<?php
/**
* SysCapsValidLang is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapsvalidlang
*
* see class Node for details
*
*/
class SysCapsValidLang extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.validLang';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
    }
}