<?php
/**
* MultiroomGroupCreate is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomgroupcreate
*
* see class Node for details
*
*/
class MultiroomGroupCreate extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.group.create';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}