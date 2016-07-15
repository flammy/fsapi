
<?php
/*
    This Class provides the upnp ssdp discovery service

*/
class ssdp{
	var $type = null;

    /**
     *  sets the local and the protected type variable
     *
     *  @return string the discovery type (ssdp:all,upnp:rootdevice...)
     *
     */
	function setDeviceType($type){
		$this->type = $type;
		return $this->type;
	}
    /**
     *  returns the local and the protected type variable
     *
     * @var string $type  the discovery type (ssdp:all,upnp:rootdevice...)
     *
     * @return string the discovery type 
     *
     */
	function getDeviceType($type){
		return $this->type;
	}


    /**
     *  checks if the basic credentials are set and sets them to default if not.
     *
     */
	function checkCredentials(){
		if($this->type == null){
			$this->setDeviceType('ssdp:all');
		}
	}
    /**
     *  scans the local network for upnp devices
     *
     * @return array with discovered devices
     */
	function scan(){
			$this->checkCredentials();
			$result = array();
			$buffer = '';
			$tmp = '';
			$headers = "M-SEARCH * HTTP/1.1\r\nHost:239.255.255.250:1900\r\nST:".$this->type."\r\nMan:\"ssdp:discover\"\r\nMX:3\r\n\r\n";
		        $socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
		        socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec'=>15, 'usec'=>10000));
	        	$i = 0;
	        	socket_sendto($socket, $headers, 1024, 0, '239.255.255.250', 1900);
		        while(@socket_recvfrom($socket, $buffer, 1024, MSG_WAITALL, $tmp, $mp)) {
					$i++;
		        	$res = $this->decode($buffer);
	       	 		if(isset($res['location'])){
	        			$res_details = $this->getDetails($res['location']);
	        			if($res_details[0] == true){
	        				$res['details'] = $res_details[1];
	        			}else{
	        				$res['details'] = false;
	        			}
	        		}
	        		$result[] = $res;
	        	}
	        	socket_close($socket);
	        	return array(true,$result);
	}


    /**
     *  sorts the plaintext answer to an readable array
     *
     * @var string $buffer the answer from the upnp device as plaintext
     *
     * @return array with sorted answer from the device
     */

	function decode($buffer){
		$array = explode("\r\n", $buffer);
		$return = array();
		foreach($array as $value){
			if($value != ""){
				$kv = explode(': ',$value);

				if($kv[0] != ""){
					$return[strtolower($kv[0])] = (isset($kv[1]) ? strtolower($kv[1]) : '');
				}
			}
		}
		return $return;
	}


    /**
     *  makes an http request to collect more data from an device provided url
     *
     * @var string $url the url to collect more data from
     *
     * @return array, first value is the status true or false the second value is an array with the answer of the device
     */
	function getDetails($url){
		$ch = curl_init();
		$curlConfig = array(
		    CURLOPT_URL            => $url,
		    CURLOPT_RETURNTRANSFER => true,
		);
		curl_setopt_array($ch, $curlConfig);
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		curl_close($ch);
        if($info['http_code'] != 200 ){
            return array(false,'SSDP Request: '.$url.' returned '.$info['http_code'].'.');
        }else if(!($result === false)){
        	return array(true,get_object_vars(simplexml_load_string($result)));
        }else{
        	return array(false, curl_error($ch));
        }

	}
}
?>