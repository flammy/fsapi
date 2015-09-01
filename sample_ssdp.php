<?php
function __autoload($class_name) {
    include 'classes/'.$class_name . '.php';
}
$ssdp = new ssdp;
//$ssdp->setDeviceType('upnp:rootdevice');
$ssdp->setDeviceType('urn:schemas-frontier-silicon-com:fs_reference:fsapi:1');
$res = $ssdp->scan();
print_r($res);
?>
