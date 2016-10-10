<?php
/**
* MultiroomDeviceTransportOptimisation is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomdevicetransportoptimisation
*
* see class Node for details
*
*/
class MultiroomDeviceTransportOptimisation extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.device.transportOptimisation';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}