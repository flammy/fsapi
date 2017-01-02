<?php
/**
* NavNumItems is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavnumitems
*
* see class Node for details
*
*/
class NavNumItems extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.numItems';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}