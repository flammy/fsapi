<?php

namespace FSAPI\Nodes;

use FSAPI\Converters\ConverterBool;

/**
* SysNetIpConfigDhcp is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetipconfigdhcp
*
* see class Node for details
*
*/
class SysNetIpConfigDhcp extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.ipConfig.dhcp';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->converter = new ConverterBool();
        $this->api_level = 1;
    }
}