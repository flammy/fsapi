<?php
/**
* SysNetWlanPerformWPS is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlanperformwps
*
* see class Node for details
*
*/
class SysNetWlanPerformWPS extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.performWPS';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->api_level = 1;
    }
}