<?php

namespace FSAPI\Nodes;

/**
* SysCfgIrAutoPlayFlag is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscfgirautoplayflag
*
* see class Node for details
*
*/
class SysCfgIrAutoPlayFlag extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.cfg.irAutoPlayFlag';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}