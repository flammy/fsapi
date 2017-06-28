<?php

namespace FSAPI\Nodes;

/**
* SysNetWlanWpsPinRead is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlanwpspinread
*
* see class Node for details
*
*/
class SysNetWlanWpsPinRead extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.wpsPinRead';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}