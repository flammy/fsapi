<?php

namespace FSAPI\Nodes;

/**
* NavBrowseMode is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavbrowsemode
*
* see class Node for details
*
*/
class NavBrowseMode extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.browseMode';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}