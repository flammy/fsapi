<?php
function __autoload($class_name) {
    include 'classes/'.$class_name . '.php';
}
$ssdp = new ssdp;
$ssdp->setDeviceType('ssdp:all');
$res = $ssdp->scan();
print_r($res);
?>