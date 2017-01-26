<?php
/**
* PlayErrorStr is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayerrorstr
*
* see class Node for details
*
*/
class PlayErrorStr extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.errorStr';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}