<?php
/**
* SysNetWlanSetAuthType is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlansetauthtype
*
* see class Node for details
*
*/
class SysNetWlanSetAuthType extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.setAuthType';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}