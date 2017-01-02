<?php
/**
* SysAlarmCurrent is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysalarmcurrent
*
* see class Node for details
*
*/
class SysAlarmCurrent extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.alarm.current';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}