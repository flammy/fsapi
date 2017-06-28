<?php

namespace FSAPI\Nodes;

/**
* SysNetWlanMacAddress is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlanmacaddress
*
* see class Node for details
*
*/
class SysNetWlanMacAddress extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.macAddress';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}