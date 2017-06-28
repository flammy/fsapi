<?php

namespace FSAPI\Nodes;

/**
* SysInfoRadioPin is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysinforadiopin
*
* see class Node for details
*
*/
class SysInfoRadioPin extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.info.radioPin';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}