<?php
/**
* MultiroomClientStatus2 is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomclientstatusx
*
* see class Node for details
*
*/
class MultiroomClientStatus2 extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.client.status2';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = true;
    }
}