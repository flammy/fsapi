<?php
/**
* TestIperfExecute is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotetestiperfexecute
*
* see class Node for details
*
*/
class TestIperfExecute extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.test.iperf.execute';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}