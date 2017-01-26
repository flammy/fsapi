<?php
/**
* NavList is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavlist
*
* see class Node for details
*
*/
class NavList extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.list';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
        $this->setter = array('netRemote.nav.action.navigate','netRemote.nav.action.selectItem');
        $this->api_level = 1;
    }
}