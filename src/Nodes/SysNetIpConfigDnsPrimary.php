<?php

namespace FSAPI\Nodes;

use FSAPI\Converters\ConverterIP;

/**
* SysNetIpConfigDnsPrimary is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetipconfigdnsprimary
*
* see class Node for details
*
*/
class SysNetIpConfigDnsPrimary extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.ipConfig.dnsPrimary';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->converter = new ConverterIP();
        $this->api_level = 1;
    }
}