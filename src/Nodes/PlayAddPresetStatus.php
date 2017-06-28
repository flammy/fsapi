<?php

namespace FSAPI\Nodes;

/**
* PlayAddPresetStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayaddpresetstatus
*
* see class Node for details
*
*/
class PlayAddPresetStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.addPresetStatus';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}