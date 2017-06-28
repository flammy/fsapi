<?php

namespace FSAPI\Nodes;

use FSAPI\Converters\ConverterIP;

/**
* SysNetIpConfigSubnetMask is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetipconfigsubnetmask
*
* see class Node for details
*
*/
class SysNetIpConfigSubnetMask extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.ipConfig.subnetMask';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->converter = new ConverterIP();
        $this->api_level = 1;
    }
}