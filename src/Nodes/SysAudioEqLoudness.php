<?php
/**
* SysAudioEqLoudness is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysaudioeqloudness
*
* see class Node for details
*
*/
class SysAudioEqLoudness extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.audio.eqLoudness';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}