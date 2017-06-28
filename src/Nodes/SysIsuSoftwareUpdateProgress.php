<?php

namespace FSAPI\Nodes;

/**
* SysIsuSoftwareUpdateProgress is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysisusoftwareupdateprogress
*
* see class Node for details
*
*/
class SysIsuSoftwareUpdateProgress extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.isu.softwareUpdateProgress';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}