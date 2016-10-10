<?php
/**
* SysCapsFmFreqRangeLower is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapsfmfreqrangelower
*
* see class Node for details
*
*/
class SysCapsFmFreqRangeLower extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.fmFreqRange.lower';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}