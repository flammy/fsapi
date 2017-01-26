<?php
/**
* PlatformSoftApUpdateUpdateModeRequest is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplatformsoftapupdateupdatemoderequest
*
* see class Node for details
*
*/
class PlatformSoftApUpdateUpdateModeRequest extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.platform.softApUpdate.updateModeRequest';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}