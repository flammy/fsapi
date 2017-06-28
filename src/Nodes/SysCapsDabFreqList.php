<?php

namespace FSAPI\Nodes;

/**
* SysCapsDabFreqList is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapsdabfreqlist
*
* see class Node for details
*
*/
class SysCapsDabFreqList extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.dabFreqList';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
        $this->api_level = 1;
    }
}