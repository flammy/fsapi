<?php

namespace FSAPI\Nodes;

/**
* SysFactoryReset is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysfactoryreset
*
* see class Node for details
*
*/
class SysFactoryReset extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.factoryReset';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}