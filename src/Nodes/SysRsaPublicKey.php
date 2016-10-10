<?php
/**
* SysRsaPublicKey is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysrsapublickey
*
* see class Node for details
*
*/
class SysRsaPublicKey extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.rsa.publicKey';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}