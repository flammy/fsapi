<?php

namespace FSAPI\Nodes;

/**
* SysAlarmSnooze is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysalarmsnooze
*
* see class Node for details
*
*/
class SysAlarmSnooze extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.alarm.snooze';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}