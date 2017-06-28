<?php

namespace FSAPI\Nodes;

/**
* SysAudioEqCustomParam2 is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysaudioeqcustomparamx
*
* see class Node for details
*
*/
class SysAudioEqCustomParam2 extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.audio.eqCustom.param2';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}