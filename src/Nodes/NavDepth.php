<?php

namespace FSAPI\Nodes;

/**
* NavDepth is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavdepth
*
* see class Node for details
*
*/
class NavDepth extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.depth';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}