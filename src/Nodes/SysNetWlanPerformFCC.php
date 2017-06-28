<?php

namespace FSAPI\Nodes;

/**
* SysNetWlanPerformFCC is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlanperformfcc
*
* see class Node for details
*
*/
class SysNetWlanPerformFCC extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.performFCC';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}