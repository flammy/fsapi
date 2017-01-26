<?php
/**
* NavActionSelectItem is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavactionselectitem
*
* see class Node for details
*
*/
class NavActionSelectItem extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.action.selectItem';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}