<?php
class Node
{
    /**
   * @var mixed $path                  Should contain a string with the path of the node, null if not set
   * @var mixed $validation_method     Should contain a string with the name of the validation method, null if not set
   * @var mixed $call_methods          Should contain an array with the names of the call methods, null if not set
   *                                   e.g. array('SET','GET','LIST_GET','LIST_GET_NEXT','CREATE_SESSION','DELETE_SESSION','GET_NOTIFIES');
   * @var mixed $notification          Should contain a bool with the notification status, null if not set
   */
    protected $path = null;
    protected $validation_method = null;
    protected $validation_rules = null;
    protected $call_methods = null;
    protected $notification = null;
    protected $setter = null;
    protected $converter = null;
    protected $api_level = null;


    /**
     * returns the full path (name) of the node
     *
     * @return string    STRING full path / name of the node: netRemote.sys.info.version
     */
    public function getPath()
    {
        if ($this->path === null) {
            throw new NodeException('Path is not initialized.');
        }
        return $this->path;
    }


    /**
     * returns the name of the input validation
     *
     * @return string    name of the validation method
     */
    public function getValidationMethod()
    {
        if ($this->validation_method === null) {
            throw new NodeException('Validation method is not initialized.');
        }
        return $this->validation_method;
    }
    
    
    /**
     * returns the converter object
     *
     * @return string    converter object
     */
    public function getConverter()
    {
        if ($this->converter === null) {
            return new Converter();
        }
        return $this->converter;
    }
    

    
    /**
     * returns the valid methods for this node
     *
     * @return array    valid call methods: array('GET','SET'...).
     */
    public function getCallMethods()
    {
        if ($this->call_methods === null) {
            throw new NodeException('Call method is not initialized.');
        }
        return $this->call_methods;
    }


    /**
     * returns if the node has notifications
     *
     * @return bool    TRUE of the node uses notifications, FALSE if not.
     */
    public function getNotification()
    {
        if ($this->notification === null) {
            throw new NodeException('Notification is not initialized.');
        }
        return $this->notification;
    }
    
    
    /**
     * returns if the node has notifications
     *
     * @return bool    TRUE of the node uses notifications, FALSE if not.
     */
    public function getSetter($condition = null)
    {
        if ($this->setter === null) {
            return self;
        }
        $setter = $this->setter;
        $NodesFactory = new NodesFactory();
        if(is_array($setter)){
            $setter = $setter[0];
            if($condition > 0){
                $setter = $setter[1];
            }
        }
        
        return $NodesFactory->getNodeByName($setter);
    }
    
    
    /**
     * validates the input with the nodes validation method
     *
     * @var string $input   The Input to validate
     *
     * @return mixed TRUE if the input matches the validation rule, FALSE if not
     *
     */
    public function validateInput($input)
    {
        $validator = new Validator($this->getValidationMethod(), $this->validation_rules);
        return $validator->validateInput($input);
    }


    /** Expose the api-level of an node
     *  @return int api-level
     */
    public function getApiLevel(){
        return $this->api_level;
    }
    
    
    
    public function checkCallMethods($method)
    {
        if ($this->call_methods === null) {
            throw new NodeException('Call method is not initialized.');
        }
        $call_methods = $this->getCallMethods();
        return in_array($method, $call_methods);
    }
}
