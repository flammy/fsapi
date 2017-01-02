<?php
class ScannerInterceptor implements Scanners
{
	var $response = null;
	var $details = null;
	
	
	
    /**
     * create a new Scanner-Interceptor Object, which simulates the broadcast and curl Request
     *
     * @var string $response    The expected response
     *
     * @var string $details        The expected details array
     *
     */
	public function __construct($response,$details = null)
    {
        $this->response = $response;
		$this->details = $details;
    }
	
	
    /**
     *  Interceptor for function which scans the local network for upnp devices
     *
     * @return array with discovered devices
     */
	function doScan($type){
		$response = $this->response;
		if(!is_null($this->details)){
			$response['details'] = $this->getDetails('TEST');
		}
		return $response;
		
	}
	
	
    /**
     *  Interceptor for function which makes an http request to collect more data from an device provided url
     *
     * @var string $url the url to collect more data from
     *
     * @return array, first value is the status true or false the second value is an array with the answer of the device
     */
	function getDetails($url){
		if($this->details === FALSE){
			throw new ScannerException('Test-Exception');
		}
		return $this->details;
	}
	
}
?>