<?php
/**
* PlayControl is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplaycontrol
*
* see class Node for details
*
*/
class PlayControl extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.control';
        $this->validation_method = 'Between';
        $this->validation_rules = array('min' => 0, 'max' => 4);
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->converter = new ConverterControl;
        $this->api_level = 1;
    }
}