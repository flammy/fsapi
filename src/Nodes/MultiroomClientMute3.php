<?php
/**
* MultiroomClientMute3 is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomclientmutex
*
* see class Node for details
*
*/
class MultiroomClientMute3 extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.client.mute3';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}