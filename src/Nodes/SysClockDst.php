<?php

namespace FSAPI\Nodes;

/**
* SysClockDst is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysclockdst
*
* see class Node for details
*
*/
class SysClockDst extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.clock.dst';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}