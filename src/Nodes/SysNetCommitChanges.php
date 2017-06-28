<?php

namespace FSAPI\Nodes;

/**
* SysNetCommitChanges is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetcommitchanges
*
* see class Node for details
*
*/
class SysNetCommitChanges extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.commitChanges';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}