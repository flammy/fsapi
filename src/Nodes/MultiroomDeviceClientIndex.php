<?php
/**
* MultiroomDeviceClientIndex is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomdeviceclientindex
*
* see class Node for details
*
*/
class MultiroomDeviceClientIndex extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.device.clientIndex';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}