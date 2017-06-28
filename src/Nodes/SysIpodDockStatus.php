<?php

namespace FSAPI\Nodes;

/**
* SysIpodDockStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysipoddockstatus
*
* see class Node for details
*
*/
class SysIpodDockStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.ipod.dockStatus';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}