<?php
interface Scanners
{
    /**
     * Scans for radios
     * @param $type device string of the upnp device
     * @return
     */

    public function doScan($type);
}
