<?php

namespace FSAPI\Nodes;

/**
* SysCapsFmFreqRangeStepSize is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapsfmfreqrangestepsize
*
* see class Node for details
*
*/
class SysCapsFmFreqRangeStepSize extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.fmFreqRange.stepSize';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}