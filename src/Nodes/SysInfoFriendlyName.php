<?php
/**
* SysInfoFriendlyName is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysinfofriendlyname
*
* see class Node for details
*
*/
class SysInfoFriendlyName extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.info.friendlyName';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}