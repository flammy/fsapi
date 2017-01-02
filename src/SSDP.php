<?php
/*
    This Class provides the upnp ssdp discovery service

*/
class SSDP implements Scanners{
	var $Scanner = null;

	
    /**
     * create a new SSDP-Object 
     *
     * @var string $host    The host for the request
     *                                  
     *
     */
    public function __construct($Scanner)
    {
		$this->Scanner = $Scanner;
    }



    /**
     *  scans the local network for upnp devices
     *
     * @return array with discovered devices
     */
	function doScan($type = 'ssdp:all'){
		return $this->Scanner->doScan($type);
	}





    /**
     *  makes an http request to collect more data from an device provided url
     *
     * @var string $url the url to collect more data from
     *
     * @return array, first value is the status true or false the second value is an array with the answer of the device
     */
	function getDetails($url){
		return $this->Scanner->getDetails($url);
	}
}
?>
