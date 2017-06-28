<?php

namespace FSAPI\Nodes;

/**
* SpotifyLastError is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotespotifylasterror
*
* see class Node for details
*
*/
class SpotifyLastError extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.spotify.lastError';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}