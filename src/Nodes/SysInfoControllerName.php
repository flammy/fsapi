<?php

namespace FSAPI\Nodes;

/**
* SysInfoControllerName is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysinfocontrollername
*
* see class Node for details
*
*/
class SysInfoControllerName extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.info.controllerName';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}