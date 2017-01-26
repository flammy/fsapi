<?php
/**
* SysCapsEqBands is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesyscapseqbands
*
* see class Node for details
*
*/
class SysCapsEqBands extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.caps.eqBands';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('LIST_GET_NEXT');    
        $this->notification = false;
        $this->api_level = 1;
    }
}