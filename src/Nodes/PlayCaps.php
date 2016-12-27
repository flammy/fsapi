<?php
/**
* PlayCaps is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplaycaps
*
* see class Node for details
*
*/
class PlayCaps extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.caps';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}