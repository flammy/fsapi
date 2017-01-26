<?php
class Scanner implements Scanners
{

    /**
     *  scans the local network for upnp devices
     *
     * @param string $type device type
     * @return array with discovered devices
     * @throws ScannerException
     */
	function doScan($type){
			$result = array();
			$buffer = '';
			$tmp = '';
			$headers = "M-SEARCH * HTTP/1.1\r\nHost:239.255.255.250:1900\r\nST:".$type."\r\nMan:\"ssdp:discover\"\r\nMX:3\r\n\r\n";
			if(!$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP)){
				throw new ScannerException(sprintf('Scan failed (SOCK: %s).', socket_strerror(socket_last_error())));
			}
			if(!socket_set_option($socket, SOL_SOCKET, SO_RCVTIMEO, array('sec'=>15, 'usec'=>10000))){
				throw new ScannerException(sprintf('Scan failed (SOCK: %s).', socket_strerror(socket_last_error())));
			}
			$i = 0;
			if(!socket_sendto($socket, $headers, 1024, 0, '239.255.255.250', 1900)){
				throw new ScannerException(sprintf('Scan failed (SOCK: %s).', socket_strerror(socket_last_error())));
			}
			while(@socket_recvfrom($socket, $buffer, 1024, MSG_WAITALL, $tmp, $mp)) {
				$i++;
				$res = $this->decode($buffer);
				if(isset($res['location'])){
					$res['details'] = $this->getDetails($res['location']);
				}
				$result[] = $res;
			}
			socket_close($socket);
			return $result;	
	}
	
	
    /**
     *  sorts the plaintext answer to an readable array
     *
     * @param string $buffer the answer from the upnp device as plaintext
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
     * makes an http request to collect more data from an device provided url
     *
     * @param string $url the url to collect more data from
     * @return array , first value is the status true or false the second value is an array with the answer of the device
     * @throws ScannerException
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
		
		
        if ($result === false) {
            throw new ScannerException(sprintf('Scan failed (CURL: %s).', $info['curl_error']));
        } elseif ($info['http_code'] != 200) {
            throw new ScannerException(sprintf('Scan failed (HTTP: %s).', $info['http_code']));
        }
		return get_object_vars(simplexml_load_string($result));
	}
	
}