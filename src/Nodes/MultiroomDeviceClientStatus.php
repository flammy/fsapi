<?php
/**
* MultiroomDeviceClientStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomdeviceclientstatus
*
* see class Node for details
*
*/
class MultiroomDeviceClientStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.device.clientStatus';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}