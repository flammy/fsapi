<?php
/**
* SysNetIpConfigDnsSecondary is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetipconfigdnssecondary
*
* see class Node for details
*
*/
class SysNetIpConfigDnsSecondary extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.ipConfig.dnsSecondary';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
    }
}