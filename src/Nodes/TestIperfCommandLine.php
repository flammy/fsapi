<?php

namespace FSAPI\Nodes;

/**
* TestIperfCommandLine is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotetestiperfcommandline
*
* see class Node for details
*
*/
class TestIperfCommandLine extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.test.iperf.commandLine';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}