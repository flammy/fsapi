<?php
/**
* SysAudioVolume is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysaudiovolume
*
* see class Node for details
*
*/
class SysAudioVolume extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.audio.volume';
        $this->validation_method = 'Between';
        $this->validation_rules = array('min' => 0, 'max' => 20);
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->api_level = 1;
    }
}