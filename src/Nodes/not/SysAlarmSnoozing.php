<?php
/**
* SysAlarmSnoozing is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysalarmsnoozing
*
* see class Node for details
*
*/
class SysAlarmSnoozing extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.alarm.snoozing';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}