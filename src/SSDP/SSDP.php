<?php

namespace FSAPI\SSDP;

/*
    This Class provides the upnp ssdp discovery service

*/
class SSDP implements Scanners{
	var $Scanner = null;

	
    /**
     * create a new SSDP-Object 
     *
     * @param Scanners $Scanner    The host for the request
     *                                  
     *
     */
    public function __construct(Scanners $Scanner)
    {
		$this->Scanner = $Scanner;
    }


    /**
     *  scans the local network for upnp devices
     *
     * @param string $type type of the upnp device
     * @return array with discovered devices
     */
	function doScan($type = 'ssdp:all'){
		return $this->Scanner->doScan($type);
	}





    /**
     *  makes an http request to collect more data from an device provided url
     *
     * @param string $url the url to collect more data from
     *
     * @return array, first value is the status true or false the second value is an array with the answer of the device
     */
	function getDetails($url){
		return $this->Scanner->getDetails($url);
	}
}
