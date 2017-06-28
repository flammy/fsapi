<?php

namespace FSAPI\Nodes;

/**
* MultiroomClientMute0 is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomclientmutex
*
* see class Node for details
*
*/
class MultiroomClientMute0 extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.client.mute0';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}