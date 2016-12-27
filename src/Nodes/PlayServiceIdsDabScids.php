<?php
/**
* PlayServiceIdsDabScids is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremoteplayserviceidsdabscids
*
* see class Node for details
*
*/
class PlayServiceIdsDabScids extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.play.serviceIds.dabScids';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}