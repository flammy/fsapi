<?php
/**
* MultiroomGroupMasterVolume is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomgroupmastervolume
*
* see class Node for details
*
*/
class MultiroomGroupMasterVolume extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.group.masterVolume';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}