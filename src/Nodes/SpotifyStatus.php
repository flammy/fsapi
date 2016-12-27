<?php
/**
* SpotifyStatus is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotespotifystatus
*
* see class Node for details
*
*/
class SpotifyStatus extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.spotify.status';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}