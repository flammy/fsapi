<?php

namespace FSAPI\Nodes;

/**
* SysNetWlanScan is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlanscan
*
* see class Node for details
*
*/
class SysNetWlanScan extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.scan';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->api_level = 1;
    }
}