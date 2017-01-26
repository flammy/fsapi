<?php
/**
* SysCapsValidModes is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapsvalidmodes
*
* see class Node for details
*
*/
class SysCapsValidModes extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.validModes';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
        $this->setter = 'netRemote.sys.mode';
        $this->api_level = 1;
    }
}