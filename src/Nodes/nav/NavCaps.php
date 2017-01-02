<?php
/**
* NavCaps is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavcaps
*
* see class Node for details
*
*/
class NavCaps extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.caps';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}