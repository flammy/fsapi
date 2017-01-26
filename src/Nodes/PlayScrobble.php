<?php
/**
* PlayScrobble is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayscrobble
*
* see class Node for details
*
*/
class PlayScrobble extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.scrobble';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = true;
        $this->converter = new ConverterBool;
        $this->api_level = 1;
    }
}