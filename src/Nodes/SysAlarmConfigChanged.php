<?php
/**
* SysAlarmConfigChanged is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysalarmconfigchanged
*
* see class Node for details
*
*/
class SysAlarmConfigChanged extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.alarm.configChanged';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}