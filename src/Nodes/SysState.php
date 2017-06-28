<?php

namespace FSAPI\Nodes;

/**
* SysState is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysstate
*
* see class Node for details
*
*/
class SysState extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.state';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}