<?php
/**
* MultiroomGroupId is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomgroupid
*
* see class Node for details
*
*/
class MultiroomGroupId extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.group.id';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}