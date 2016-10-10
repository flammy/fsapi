<?php
/**
* SysNetWlanInterfaceEnable is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlaninterfaceenable
*
* see class Node for details
*
*/
class SysNetWlanInterfaceEnable extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.interfaceEnable';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}