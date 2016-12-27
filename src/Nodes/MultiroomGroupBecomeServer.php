<?php
/**
* MultiroomGroupBecomeServer is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomgroupbecomeserver
*
* see class Node for details
*
*/
class MultiroomGroupBecomeServer extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.group.becomeServer';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}