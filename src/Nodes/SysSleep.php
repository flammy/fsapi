<?php

namespace FSAPI\Nodes;

/**
* SysSleep is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyssleep
*
* see class Node for details
*
*/
class SysSleep extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.sleep';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}