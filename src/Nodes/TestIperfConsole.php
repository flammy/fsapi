<?php

namespace FSAPI\Nodes;

/**
* TestIperfConsole is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotetestiperfconsole
*
* see class Node for details
*
*/
class TestIperfConsole extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.test.iperf.console';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}