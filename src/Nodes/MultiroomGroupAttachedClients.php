<?php
/**
* MultiroomGroupAttachedClients is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomgroupattachedclients
*
* see class Node for details
*
*/
class MultiroomGroupAttachedClients extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.group.attachedClients';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}