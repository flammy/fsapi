<?php
/**
* SysAudioMute is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysaudiomute
*
* see class Node for details
*
*/
class SysAudioMute extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.audio.mute';
        $this->validation_method = false;
        $this->validation_rules = 'Bool';
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->converter = new ConverterBool;
        $this->api_level = 1;
    }
}