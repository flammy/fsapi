<?php

namespace FSAPI\Nodes;

/**
* NavState is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavstate
*
* see class Node for details
*
*/
class NavState extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.state';
        $this->validation_method = 'Bool';
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}