<?php
/**
* SysIsuSummary is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysisusummary
*
* see class Node for details
*
*/
class SysIsuSummary extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.isu.summary';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}