<?php

class Request implements Requests
{
    protected $host = null;
    
    
    /**
     * create a new Request-Object 
     *
     * @var string $host    The host for the request
     *                                  
     *
     */
    public function __construct($host,$sid = false,$pin = false)
    {
        $this->host = $host;
    }
    
    
    /**
     * Check the result of the request 
     *
     * @var mixed $response     The plain response from curl
     *
     * @var array $info        The info array from curl
     *
     * @throws RequestException if the request fails
     *
     * @return string - plain request data on success false on error
     * 
     */
    protected function checkRequest($response, $info)
    {
        if ($response === false) {
            throw new RequestException(sprintf('Connection  failed (CURL: %s).', $info['curl_error']));
        } elseif ($info['http_code'] == 403) {
            throw new RequestException(sprintf('Pin incorrect (HTTP: %s).', $info['http_code']));
        } elseif ($info['http_code'] != 200) {
            throw new RequestException(sprintf('Connection failed (HTTP: %s).', $info['http_code']));
        }
        return $response;
    }
    
    
    /**
     * Do the actual request via CURL
     *
     * @var string $method      The method (GET,SET,...)
     *
     * @var string $node        The name of the Node (netRemote.sys.info.version)
     *
     * @var array $attributes   Additional attributes for the request (pin, session,...)
     *                                  
     * @var string $delimiter   Delimiter is necessary for some functions, it is added as a virtual folder to the url
     *
     * @throws RequestException if the request fails or curl is not present
     *
     * @return string - plain request data on success false on error
     * 
     */
    public function doRequest($method, $Node = null, $attributes = array(), $delimiter = "")
    {
        $url =$this->host."/fsapi/".$method."/";
        if ($Node != null) {
            if ($delimiter != "") {
                $delimiter = "/".$delimiter;
            }
            $attributes_string = "";
            if (count($attributes) > 0) {
                $attributes_string = http_build_query($attributes);
            }
            $url .= $Node->getPath().$delimiter.$attributes_string;
        }
        
        if (!function_exists('curl_init')) {
            throw new RequestException(sprintf('CURL not found, please install php-curl.'));
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        $info['curl_error'] = curl_error($ch);
        curl_close($ch);
        return $this->checkRequest($response, $info);
    }
}
