<?php
/**
* SysCapsUtcSettingsList is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapsutcsettingslist
*
* see class Node for details
*
*/
class SysCapsUtcSettingsList extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.utcSettingsList';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
    }
}