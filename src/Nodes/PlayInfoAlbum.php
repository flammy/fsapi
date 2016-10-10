<?php
/**
* PlayInfoAlbum is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayinfoalbum
*
* see class Node for details
*
*/
class PlayInfoAlbum extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.info.album';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}