<?php
class FSAPI implements Requests
{
    protected $call_method_whitelist = array('CREATE_SESSION','DELETE_SESSION','GET_NOTIFIES');
    protected $Request = null;
    
    /**
     * create a new FSAPI-Object 
     *
     * @var object Request $Request   The Request Object which does the actual Request
     *                                  
     *
     */
    public function __construct(Request $Request)
    {
        $this->Request = $Request;
    }
    
    
    /**
     * Do the request-call via the Request Object
     *
     * @var string $method      The method (GET,SET,...)
     *
     * @var string $node        The name of the Node (netRemote.sys.info.version)
     *
     * @var array $attributes   Additional attributes for the request (pin, session,...)
     *                                  
     * @var string $delimiter   Delimiter is necessary for some functions, it is added as a virtual folder to the url
     *
     * @throws RequestException if request fails
     *
     * @return string - plain request data on success false on error
     * 
     */
    public function doRequest($method, $node = null, $attributes = array(), $delimiter = "")
    {
        if ($node !== null) {
            // whitelisted via node
            if ($node->checkCallMethods($method) == false) {
                return false;
            }
        } else {
            // whitelisted via global whitelist
            if (!in_array($method, $call_method_whitelist)) {
                return false;
            }
        }
        
        if (isset($attributes['value'])) {
            // input-validation if there is a new value
            if (!$node->validateInput($attributes['value'])) {
                return false;
            }
        }
            
        return $this->Request->doRequest($method, $node, $attributes, $delimiter);
    }
}
