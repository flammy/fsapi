<?php
/**
* MultiroomDeviceListAll is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomdevicelistall
*
* see class Node for details
*
*/
class MultiroomDeviceListAll extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.device.listAll';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
    }
}