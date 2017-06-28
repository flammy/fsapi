<?php

namespace FSAPI\Nodes;

/**
* MultiroomGroupState is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomgroupstate
*
* see class Node for details
*
*/
class MultiroomGroupState extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.group.state';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}