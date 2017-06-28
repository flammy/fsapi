<?php

namespace FSAPI\Nodes;

/**
* NavDabScanUpdate is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavdabscanupdate
*
* see class Node for details
*
*/
class NavDabScanUpdate extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.dabScanUpdate';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}