<?php

namespace FSAPI\Nodes;

/**
* PlatformSoftApUpdateUpdateModeStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplatformsoftapupdateupdatemodestatus
*
* see class Node for details
*
*/
class PlatformSoftApUpdateUpdateModeStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.platform.softApUpdate.updateModeStatus';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}