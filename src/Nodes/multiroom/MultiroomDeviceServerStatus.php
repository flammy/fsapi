<?php
/**
* MultiroomDeviceServerStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomdeviceserverstatus
*
* see class Node for details
*
*/
class MultiroomDeviceServerStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.device.serverStatus';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}