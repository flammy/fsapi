<?php
/**
* PlayFrequency is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayfrequency
*
* see class Node for details
*
*/
class PlayFrequency extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.frequency';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
    }
}