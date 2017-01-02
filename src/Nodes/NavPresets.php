<?php
/**
* NavPresets is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavpresets
*
* see class Node for details
*
*/
class NavPresets extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.presets';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
        $this->setter = 'netRemote.nav.action.selectPreset';
    }
}