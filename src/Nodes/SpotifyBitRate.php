<?php
/**
* SpotifyBitRate is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotespotifybitrate
*
* see class Node for details
*
*/
class SpotifyBitRate extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.spotify.bitRate';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}