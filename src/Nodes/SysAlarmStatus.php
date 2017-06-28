<?php

namespace FSAPI\Nodes;

/**
* SysAlarmStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysalarmstatus
*
* see class Node for details
*
*/
class SysAlarmStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.alarm.status';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}