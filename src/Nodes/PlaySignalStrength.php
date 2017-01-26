<?php
/**
* PlaySignalStrength is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplaysignalstrength
*
* see class Node for details
*
*/
class PlaySignalStrength extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.signalStrength';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}