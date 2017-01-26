<?php
/**
* SysNetWlanSetFccTestTxDataPattern is a class type Node
*
* https://github.com/flammy/fsapi/blob/master/FSAPI.md#netremotesysnetwlansetfcctesttxdatapattern
*
* see class Node for details
*
*/
class SysNetWlanSetFccTestTxDataPattern extends Node implements Nodes
{
    public function __construct()
    {
        $this->path = 'netRemote.sys.net.wlan.setFccTestTxDataPattern';
        $this->validation_method = false;
        $this->validation_rules = false;
        $this->call_methods = array('SET','GET');    
        $this->notification = false;
        $this->api_level = 1;
    }
}