<?php
/**
* SysNetIpConfigGateway is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetipconfiggateway
*
* see class Node for details
*
*/
class SysNetIpConfigGateway extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.ipConfig.gateway';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->converter = new ConverterIP;
        $this->api_level = 1;
    }
}