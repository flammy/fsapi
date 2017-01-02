<?php
/**
* SysCapsEqPresets is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapseqpresets
*
* see class Node for details
*
*/
class SysCapsEqPresets extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.eqPresets';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
        $this->setter = 'netRemote.sys.audio.eqPreset';
    }
}