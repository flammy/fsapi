<?php
/**
* SysNetWlanConnectedSSID is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlanconnectedssid
*
* see class Node for details
*
*/
class SysNetWlanConnectedSSID extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.connectedSSID';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('GET');    
        $this->notification = false;
    }
}