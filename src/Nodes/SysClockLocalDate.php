<?php
/**
* SysClockLocalDate is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysclocklocaldate
*
* see class Node for details
*
*/
class SysClockLocalDate extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.clock.localDate';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->converter = new ConverterDateTime;
    }
}