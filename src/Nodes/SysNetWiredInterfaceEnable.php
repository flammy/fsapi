<?php

namespace FSAPI\Nodes;

use FSAPI\Converters\ConverterBool;

/**
* SysNetWiredInterfaceEnable is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwiredinterfaceenable
*
* see class Node for details
*
*/
class SysNetWiredInterfaceEnable extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wired.interfaceEnable';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->converter = new ConverterBool();
        $this->api_level = 1;
    }
}