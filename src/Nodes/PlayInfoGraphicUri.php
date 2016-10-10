<?php
/**
* PlayInfoGraphicUri is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayinfographicuri
*
* see class Node for details
*
*/
class PlayInfoGraphicUri extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.info.graphicUri';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}