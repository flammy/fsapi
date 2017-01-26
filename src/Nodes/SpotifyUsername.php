<?php
/**
* SpotifyUsername is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotespotifyusername
*
* see class Node for details
*
*/
class SpotifyUsername extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.spotify.username';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}