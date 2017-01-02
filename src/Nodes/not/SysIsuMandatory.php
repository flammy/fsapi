<?php
/**
* SysIsuMandatory is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysisumandatory
*
* see class Node for details
*
*/
class SysIsuMandatory extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.isu.mandatory';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}