<?php
/**
* NavActionSelectPreset is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotenavactionselectpreset
*
* see class Node for details
*
*/
class NavActionSelectPreset extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.nav.action.selectPreset';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}