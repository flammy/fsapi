<?php

namespace FSAPI\Nodes;

/**
* SysInfoVersion is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysinfoversion
*
* see class Node for details
*
*/
class SysInfoVersion extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.info.version';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}