<?php
/**
* MiscFsDebugComponent is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemiscfsdebugcomponent
*
* see class Node for details
*
*/
class MiscFsDebugComponent extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.misc.fsDebug.component';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}