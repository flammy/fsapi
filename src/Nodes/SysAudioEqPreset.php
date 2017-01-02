<?php
/**
* SysAudioEqPreset is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysaudioeqpreset
*
* see class Node for details
*
*/
class SysAudioEqPreset extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.audio.eqPreset';
        $this->validation_method = 'Between';
        $this->validation_rules = array('min' => 0, 'max' => 5);
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->converter = new ConverterList;
    }
}