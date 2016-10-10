<?php
/**
* PlayStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplaystatus
*
* see class Node for details
*
*/
class PlayStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.status';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}