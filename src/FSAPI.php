<?php

namespace FSAPI;

use FSAPI\Nodes\Nodes;
use FSAPI\Parsers\Parser;
use FSAPI\Request\Requests;
use FSAPI\Request\Request;
use FSAPI\Nodes\NodesFactory;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;


class FSAPI implements Requests
{
    protected $call_method_whitelist = array('CREATE_SESSION','DELETE_SESSION','GET_NOTIFIES');
    protected $Request = null;
    /**
     * @var LoggerInterface
     */
    private $logger;
    
    /**
     * create a new FSAPI-Object 
     *
     * @param Request $Request The Request Object which does the actual Request
     *                                  
     *
     */
    public function __construct(Request $Request)
    {
        $this->Request = $Request;
        $this->logger = new NullLogger();
    }


    /**
     * Set a PSR-3 Logger
     * @param LoggerInterface $logger
     */
    public function setLogger($logger){
        if(method_exists($logger,'withName')){
            $logger = $logger->withName('FSAPI');
        }
        $this->logger = $logger;
    }

    /**
     * Do the request-call via the Request Object
     *
     * @param string $method  The method (GET,SET,...)
     * @param null|Nodes $node The name of the Node (netRemote.sys.info.version)
     * @param array $attributes Additional attributes for the request (pin, session,...)
     * @param string $delimiter Delimiter is necessary for some functions, it is added as a virtual folder to the url
     *
     * @return string if request fails
     *
     * @throws FSAPIException
     */
    public function doRequest($method, $node = null, $attributes = array(), $delimiter = "")
    {
        if ($node !== null) {
            if(!is_object($node)){
                $NodesFactory = new NodesFactory();
                $node = $NodesFactory->getNodeByName($node);
            }
            
            // whitelisted via node
            if ($node->checkCallMethods($method) == false) {
                throw new FSAPIException(sprintf('Method %s is not whitelisted for %s.', $method,$node->getPath()));
            }
        } else {
            // whitelisted via global whitelist
            if (!in_array($method, $this->call_method_whitelist)) {
                throw new FSAPIException(sprintf('Method %s is not globaly whitelisted for %s.', $method,$node->getPath()));
            }
        }
        
        if (isset($attributes['value'])) {
            // input-validation if there is a new value
            if (!$node->validateInput($attributes['value'])) {
                throw new FSAPIException(sprintf('Validation Failed.', $method));
            }
	}
	try {
            return $this->convertResult($this->Request->doRequest($method, $node, $attributes, $delimiter));
	} catch(\Exception $e) {
		error_log(sprintf("Exception for %s->%s: %s",$node->getPath(),$method,$e->getMessage()));
	}
    }



    protected function convertResult($result){
        $parser = new Parser();
        return $parser->parseResult($result);
    } 
}
