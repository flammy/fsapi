<?php
/**
* PlayAddPreset is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayaddpreset
*
* see class Node for details
*
*/
class PlayAddPreset extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.addPreset';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}