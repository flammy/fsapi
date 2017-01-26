<?php

class Request implements Requests
{
    protected $host = null;


    /**
     * create a new Request-Object
     *
     * @param string $host The host for the request
     * @param null $sid session id
     * @param null $pin pin
     *
     */
    public function __construct($host,$sid = null,$pin = null)
    {
        $this->host = $host;
        $this->sid = $sid;
        $this->pin = $pin;
    }
    
    
    public function setSID($sid){
        $this->sid = $sid;
    }
    
    
    
    /**
     * Check the result of the request 
     *
     * @param mixed $response     The plain response from curl
     *
     * @param array $info        The info array from curl
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
     * @param string $method      The method (GET,SET,...)
     *
     * @param string $Node        The name of the Node (netRemote.sys.info.version)
     *
     * @param array $attributes   Additional attributes for the request (pin, session,...)
     *                                  
     * @param string $delimiter   Delimiter is necessary for some functions, it is added as a virtual folder to the url
     *
     * @throws RequestException if the request fails or curl is not present
     *
     * @return string - plain request data on success false on error
     * 
     */
    public function doRequest($method, $Node = null, $attributes = array(), $delimiter = "")
    {




        if($this->sid != null){
            $attributes['sid'] = $this->sid;
        }
        $attributes['pin'] = $this->pin;
        
        
        $url = $this->host."/fsapi/".$method."/";
        if ($Node != null) {
           $url .= $Node->getPath();

        }
        if ($delimiter != "") {
            $delimiter = "/".$delimiter;
        }

        if (count($attributes) > 0) {
            $url .= $delimiter."?".http_build_query($attributes);
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
        $response = $this->checkRequest($response, $info);
        
        
        if($method == 'SET'){
            // get the current value if a new value was set
            return $this->doRequest('GET', $Node, $attributes, $delimiter);
        }
        return $response;
    }
}