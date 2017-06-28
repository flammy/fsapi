<?php

namespace FSAPI\Nodes;

/**
* SysAudioExtStaticDelay is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysaudioextstaticdelay
*
* see class Node for details
*
*/
class SysAudioExtStaticDelay extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.audio.extStaticDelay';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}