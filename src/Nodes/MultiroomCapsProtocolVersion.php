<?php

namespace FSAPI\Nodes;

/**
* MultiroomCapsProtocolVersion is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotemultiroomcapsprotocolversion
*
* see class Node for details
*
*/
class MultiroomCapsProtocolVersion extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.multiroom.caps.protocolVersion';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}