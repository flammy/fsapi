<?php

class RequestInterceptor extends Request implements Requests
{
    protected $response = null;
    
    
    /**
     * create a new Request-Interceptor Object, which simulates the curl Request
     *
     * @param string $response    The expected response
     *
     * @param array $info        The expected curl info-array
     *
     */
    public function __construct($response, $info = array('http_code' => 200, 'curl_error' => 'test error'))
    {
        $this->response = $response;
        $this->info = $info;
    }
    
    
    
    /**
     * Do the actual request via Simulator
     *
     * @param string $method      The method (GET,SET,...)
     *
     * @param string $Node        The name of the Node (netRemote.sys.info.version)
     *
     * @param array $attributes   Additional attributes for the request (pin, session,...)
     *                                  
     * @param string $delimiter   Delimiter is necessary for some functions, it is added as a virtual folder to the url
     *
     * @return string - plain request data on success false on error
     * 
     */
    public function doRequest($method, $Node = null, $attributes = array(), $delimiter = "")
    {
        return $this->checkRequest($this->response, $this->info);
    }
}
