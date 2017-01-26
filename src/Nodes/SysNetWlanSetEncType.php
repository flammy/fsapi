<?php
/**
* SysNetWlanSetEncType is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlansetenctype
*
* see class Node for details
*
*/
class SysNetWlanSetEncType extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.setEncType';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}