<?php


/**
  * This file contains examples for the usage of the ssdp class.
  */

// Autoload all classes from ./classes/
function __autoload($class_name) {
    include dirname(__file__).'/../src/'.$class_name . '.php';
}

// create new object from ssdp
$ssdp = new ssdp;


/**
 * Set the device type to search for:
 * possible values:
 *
 *   ssdp:all - search for all devices
 *   upnp:rootdevice - search for all root devices
 *   uuid:device-uuid  - find device by uuid
 *   ...
 *   'urn:schemas-frontier-silicon-com:fs_reference:fsapi:1' - find all frontier-silicon devices
 *
 * for detailed see UPnP Device Architecture (1.2.3 Discovery: Search: Response) 
 *
 */
$ssdp->setDeviceType('urn:schemas-frontier-silicon-com:fs_reference:fsapi:1');

// Start the Search
$result = $ssdp->scan();

// Get all the devices 
print_r($result);
?>
