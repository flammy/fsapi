<?php
/**
* MultiroomCapsMaxClients is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomcapsmaxclients
*
* see class Node for details
*
*/
class MultiroomCapsMaxClients extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.caps.maxClients';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}