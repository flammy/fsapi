<?php
/*
    This Class provides the basic communication and validation methods.

*/
class fsapi{
    protected  $pin = null;
    protected  $host = null;
    protected  $sid = null;
    protected  $rw = null;
    protected  $validation = null;
    protected  $operation = null;
    protected  $loglevel = false;
    protected  $unittest_active = false;
    protected  $unittest_data = array();

    /**
     *  returns the local and the protected pin variable
     *
     *  @return int the device pin
     *
     */
    public function getpin(){
        return $this->pin;
    }


    /**
     *  returns the local and the protected host variable
     *
     *  @return string the hostname of the device
     *
     */
    public function gethost(){
        return $this->host ;
    }


    /**
     *  returns the local and the protected sid variable
     *
     *  @return string the current sid
     *
     */
    public function getsid(){
        return $this->sid ;
    }


    /**
     *  returns the local and the protected rw variable
     *
     *  @return array with all available nodes and their operations (if value is null, there is no node validation)
     *
     */
    public function getrw(){
        return $this->rw;
    }


    /**
     *  returns the local and the protected validation variable
     *
     *  @return array with all available validation rules 
     *
     */
    public function getvalidation(){
        return $this->validation;
    }


    /**
     *  returns the local and the protected operation variable
     *
     *  @return array with all available operation modes
     *
     */
    public function getoperation(){
        return $this->operation;
    }


    /**
     *  returns the local and the protected loglevel variable
     *
     *  @return int the current loglevel (0=off, 0 < verbose)
     *
     */
    public function getloglevel(){
        return $this->loglevel;
    }


    /**
     *  returns the local and the protected logtarget variable
     *
     *  @return string the current logtarget (where to ouput the debug data)
     *
     */
    public function getlogtarget(){
        return $this->logtarget;
    }




    /**
     *  returns the local and the protected unittest_active variable
     *
     *  @return bool $unittest_active 
     *
     */
    public function getunittest_active(){
        return $this->unittest_active;
    }



    /**
     *  returns the local and the protected unittest_data variable
     *
     *  @return array $unittest_data 
     *
     */
    public function getunittest_data(){
        return $this->unittest_data;
    }




    /**
     *  sets the local and the protected pin variable
     *
     *  @var string $pin          the pin of the device
     *
     */
    public function setpin($pin){
        $this->pin = $pin;
    }


    /**
     *  sets the local and the protected host variable
     *
     *  @var string $host          the hostname of the device
     *
     */
    public function sethost($host){
        $this->host = $host;
    }


    /**
     *  sets the local and the protected sid variable
     *
     *  @var string $sid          the session id
     *
     */
    public function setsid($sid){
        $this->sid = $sid;
    }


    /**
     *  sets the local and the protected rw variable
     *
     *  @var array with all available nodes and their operations (if set to null, there is no node validation)
     *
     */
    public function setrw($rw){
        $this->rw = $rw;
    }


    /**
     *  sets the local and the protected validation variable
     *
     *  @var array with all available validation rules
     *
     */
    public function setvalidation($validation){
        $this->validation = $validation;
    }


    /**
     *  sets the local and the protected operation variable
     *
     *  @var array with all available operations
     *
     */
    public function setoperation($operation){
        $this->operation = $operation;
    }

    /**
     *  sets the local and the protected loglevel variable
     *
     *  @var int $loglevel current loglevel (0=off, 0 < verbose)
     *
     */
    public function setloglevel($loglevel){
        $this->loglevel = $loglevel;
    }


    /**
     *  sets the local and the protected logtarget variable
     *
     *  @var string $logtarget the current logtarget (where to ouput the debug data)
     *
     */
    public function setlogtarget($logtarget){
        $this->logtarget = $logtarget;
    }


    /**
     *  sets the local and the protected unittest_active variable
     *
     *  @var bool $unittest_active 
     *
     */
    public function setunittest_active($unittest_active){
        $this->unittest_active = $unittest_active;
    }



    /**
     *  sets the local and the protected unittest_data variable
     *
     *  @var array $unittest_data 
     *
     */
    public function setunittest_data($unittest_data){
        $this->unittest_data = $unittest_data;
    }



    /**
     *  Constructor - prepares initial settings fot the connection
     *
     */
   function __construct() {
       $this->rw = array(
            /* System */
           'netRemote.sys.info.version' => array('GET'),
           'netRemote.sys.info.radioId' => array('GET'),
           'netRemote.sys.info.friendlyName' => array('GET','SET'),
           'netRemote.sys.net.wired.interfaceEnable' => array('GET'),
           'netRemote.sys.net.wired.macAddress' => array('GET'),
           'netRemote.sys.net.wlan.interfaceEnable' => array('GET'),
           'netRemote.sys.net.wlan.macAddress' => array('GET'),
           'netRemote.sys.net.wlan.connectedSSID' => array('GET'),
           'netRemote.sys.net.wlan.setEncType' => array('GET'),
           'netRemote.sys.net.wlan.setAuthType' => array('GET'),
           'netRemote.sys.net.wlan.rssi' => array('GET'),
           'netRemote.sys.net.ipConfig.dhcp' => array('GET'),
           'netRemote.sys.net.ipConfig.address' => array('GET'),
           'netRemote.sys.net.ipConfig.subnetMask' => array('GET'),
           'netRemote.sys.net.ipConfig.gateway' => array('GET'),
           'netRemote.sys.net.ipConfig.dnsPrimary' => array('GET'),
           'netRemote.sys.net.ipConfig.dnsSecondary' => array('GET'),
           'netRemote.sys.audio.volume' => array('GET','SET'),
           'netRemote.sys.audio.mute' => array('GET','SET'),
           'netRemote.sys.audio.eqPreset' => array('GET','SET'),
           'netRemote.sys.audio.eqLoudness' => array('GET','SET'),
           'netRemote.sys.audio.eqCustom.param0' => array('GET','SET'),
           'netRemote.sys.audio.eqCustom.param1' => array('GET','SET'),
           'netRemote.sys.caps.dabFreqList' => array('LIST_GET_NEXT'),
           'netRemote.sys.caps.volumeSteps' => array('GET'),
           'netRemote.sys.caps.fmFreqRange.lower' => array('GET'),
           'netRemote.sys.caps.fmFreqRange.upper' => array('GET'),
           'netRemote.sys.caps.fmFreqRange.stepSize' => array('GET'),
           'netRemote.sys.caps.eqPresets' => array('LIST_GET_NEXT'),
           'netRemote.sys.caps.eqBands' => array('LIST_GET_NEXT'),
           'netRemote.sys.caps.validModes' => array('LIST_GET_NEXT'),
           'netRemote.sys.clock.localDate' => array('GET'),
           'netRemote.sys.clock.localTime' => array('GET'),
           'netRemote.sys.mode' => array('GET','SET'),
           'netRemote.sys.power' => array('GET','SET'),
           'netRemote.sys.lang' => array('GET'),

           /* Play */
           'netRemote.play.frequency' => array('GET','SET'),
           'netRemote.play.serviceIds.fmRdsPi' => array('GET'),
           'netRemote.play.scrobble' => array('GET'),
           'netRemote.play.serviceIds.ecc' => array('GET'),
           'netRemote.play.repeat' => array('GET','SET'),
           'netRemote.play.info.name' => array('GET'),
           'netRemote.play.info.text' => array('GET'),
           'netRemote.play.status' => array('GET'),
           'netRemote.play.caps' => array('GET'),
           'netRemote.play.shuffle' => array('GET','SET'),
           'netRemote.play.control' => array('GET','SET'),
           'netRemote.play.info.album' => array('GET'),
           'netRemote.play.info.artist' => array('GET'),
           'netRemote.play.info.graphicUri' => array('GET'),
           'netRemote.play.position' => array('GET'),
           'netRemote.play.info.duration' => array('GET'),
           'netRemote.play.rate' => array('GET'),
           'netRemote.play.signalStrength' => array('GET'),

           /* Nav */
           'netRemote.nav.action.dabScan' => array('GET'),
           'netRemote.nav.status' => array('GET','SET'),
           'netRemote.nav.presets' => array('LIST_GET_NEXT'),
           'netRemote.nav.list' => array('LIST_GET_NEXT'),
           'netRemote.nav.action.selectItem' => array('GET','SET'),
           'netRemote.nav.action.navigate' => array('GET','SET'),
           'netRemote.nav.caps' => array('GET'),
           'netRemote.nav.state' => array('GET','SET'),
           'netRemote.nav.action.selectPreset' => array('GET','SET'),
	       'netRemote.nav.numItems' => array('GET'),
       );

       // Initial Input validation for nodes to prevent communication overhead 
       $this->validation = array(
            'netRemote.sys.audio.volume' => array('between',array(0,20)),
            'netRemote.sys.audio.mute' => array('bool'),
            'netRemote.sys.power' => array('bool'),
            'netRemote.play.shuffle' => array('bool'),
            'netRemote.play.repeat' => array('bool'),
            'netRemote.nav.state' => array('bool'),
            'netRemote.sys.audio.eqPreset' => array('between',array(0,5)),
            'netRemote.play.control' => array('between',array(0,4)),
       );

       // Initial valid methods 
       $this->operation = array('SET','GET','LIST_GET','LIST_GET_NEXT','CREATE_SESSION','DELETE_SESSION','GET_NOTIFIES');

       $this->loglevel = 0;
       $this->logtarget = FALSE;
   }

    /**
     *  Descructor - prepares shutdown and cleanup
     *
     */
    function __destruct(){
        $this->ioLogger("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        if($this->sid != null ){
            $result = $this->call('DELETE_SESSION', '');
            $this->ioLogger($result,4);
        }
    }


    /**
     * Converting a field to the right datatype
     *
     *  @var array $response - the raw-array with the requested data from the device
     *
     *  @return mixed the encoded data
     *
     */
    public function encode($response){
        $this->ioLogger("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        foreach($response as $type => $message){
            $this->ioLogger($type." : ".$message,4);
            switch($type){
                case "u8":
                case "u16":
                case "u32":

                case "s8":
                case "s16":
                case "s32":
                    return (float) trim($message);
                case "c8_array":
                    return trim($message);
                case "array":
                    return pack('H*', $message);
            }
        }
    }


    /**
     * Converting a list to an array
     *
     *  @var array $response - the raw-array with the requested data from the device
     *
     *  @return array with encoded data
     *
     */
    public function encode_list($response){
        $this->ioLogger("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $result =  array();
        $this->ioLogger($response,4);
        foreach($response as $item){
            if(is_array($item['field'])){
                foreach($item['field'] as $data){
                    $a_data = (array) $data;
                    foreach($a_data as $entry_key => $entry){
                        $this->ioLogger( $entry_key,4);
                        if($entry_key != '@attributes'){
                            $a_entry = (array)$entry;
                            $result[$item['@attributes']['key']][$a_data['@attributes']['name']] =     $a_entry[0];
                        }
                    }
                }
            }else{
                $a_data = (array) $item['field'];
                foreach($a_data as $entry_key => $entry){
                    $this->ioLogger( $entry_key,4);
                    if($entry_key != '@attributes'){
                        $a_entry = (array)$entry;
                        $result[$item['@attributes']['key']][$a_data['@attributes']['name']] =     $a_entry[0];
                    }
                }
            }


        }
        return $result;
    }




    /**
     * checks if a given value passes the given validation rules for an node
     *
     *  @var mixed $attr - the value to check
     *
     *  @var mixed $method - the method to check with (e.g. bool, between)
     *
     *  @return array - first parameter is bool (the validation status) the second is string (error-message, if there is any)  
     *
     */
    public function validate($attr,$method){
        $this->ioLogger("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        switch($method[0]){
            case 'bool':
                if(($attr === 0 || $attr === 1) || is_bool($attr)){
                    return array(true, (bool) $attr);
                }else{
                    return array(false,"Value ".$attr." is not boolean");
                }

            case 'between':
                if(is_numeric ($attr) && ($attr >= $method[1][0] && (int) $attr <= $method[1][1])){
                    return array(true, (int) $attr);
                }else{
                    return array(false,"Value ".$attr." is not between ".$method[1][0]." and ".$method[1][1]);
                }
            default:
                return array(false,"No validation rule found");
        }


    }


    /**
     * Function for making a request
     *
     *  @var string $operation - the Operation (eg SET)
     *
     *  @var string $node - the node 
     *
     *  @var string $attr - (optional) the new Value for the node
     * 
     *  @var string $folder - (optional)  append an additional folder to the url
     *
     *  @return array - first parameter is bool (the validation status) the second is string (data or error message)  
     *
     */
    public function call($operation, $node = null, $attr = array(),$folder = ""){
        $this->ioLogger("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        if($this->pin == null){
            return array(false,'no pin given');
        }
        // if whe don't have any Session try to login with the given pin
        if($operation != 'CREATE_SESSION'){
            if($this->sid == null ){
                $session = $this->call('CREATE_SESSION', '');
                $this->ioLogger($session,4);
                if($session[0] == true){
                    $this->sid = $session[1];
                }else{
                    return array(false, $session[1]);
                }
            }
        }

        // Check if operation (GET, SET, etc. ) is valid
        if(!in_array($operation,$this->operation)){
            return array(false,'Client: Unknown Operation '.$operation);
        }

        // Check if operation is allowed for this node (some nodes are read only)
        $rw = $this->rw;
        if($rw != null){
            if(($operation != 'CREATE_SESSION' && $operation != 'DELETE_SESSION' && $operation != 'GET_NOTIFIES') && (!isset($rw[$node]) || !in_array($operation,$rw[$node]))){
                return array(false,'Client: Operation '.$operation.' not in whiteliste for '.$node.'');
            }
        }

        $validation = $this->validation;
        if($operation == 'SET' && isset($validation[$node])){
            $valid = $this->validate($attr['value'], $validation[$node]);
            $this->ioLogger($valid,4);
            if(!$valid[0]){
                return array(false, "Validation for ".$node." failed: ".$valid[1]);

            }
        }

        // Append an additional folder to the url , in most cases -1
        if($folder != ""){
            $folder = "/".$folder;
        }
        $url = $this->host."/fsapi/".$operation."/".$node.$folder."?pin=".$this->pin;

        // Build the HTTP-GET variable-set
        if($this->sid != null){
            $url .= "&sid=".$this->sid;
        }
        if(count($attr) > 0){
            foreach($attr as $key => $value){
                $url .= "&".$key."=".$value;
            }
        }
        $this->ioLogger($url,3);

        
        if($this->unittest_active == true && (count($this->unittest_data) > 0)){
        	$this->ioLogger("Emulating CURL Request",3);
        	$unittest_data = $this->unittest_data;
        	$response = $unittest_data['response'];
        	$info = $unittest_data['info'];
        	$curl_error = $unittest_data['curl_error'];
        }else{
        	$this->ioLogger("Running CURL Request",3);
	        $ch = curl_init();
	        curl_setopt($ch, CURLOPT_URL, $url);
	        curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
	        curl_setopt($ch,CURLOPT_TIMEOUT,5);
	        $response = curl_exec($ch);
	        $info = curl_getinfo($ch);
	        $curl_error = curl_error($ch);
	        curl_close($ch);
        }

        if($response === false){
            $return =  array(false, $curl_error);
        }elseif($info['http_code'] == 403 ){
            return array(false,'Connection: Incorrect Pin '.$this->pin);
        }elseif($info['http_code'] != 200 ){
            return array(false,'Connection: Failed ('.$info['http_code'].')');
        }else{
            $this->ioLogger($response,4);
            $xml = new SimpleXMLElement($response);
            switch($xml->status){
                // everything is ok
               case 'FS_OK':
                    $this->ioLogger($xml,4);
                    if(isset($xml->value)){
                        return array(true,$this->encode((array)$xml->value));
                    }elseif($xml->sessionId){
                        // Session-Id is not stored in the value field
                        return array(true,$this->encode((array)$xml->sessionId));
                        
                    }else{
                        // it seems to be an array
                        $arr = array();
                        $i = 0;
                        foreach($xml->item as $item){
                            $arr[$i] = (array)$item;
                            $i++;
                        }
                        return array(true,$this->encode_list($arr));
                    }
                // we got an error
                case 'FS_FAIL':
                   return array(false,"Server: ".$xml->status);
                case 'FS_PACKET_BAD':
                    return array(false,"Server: ".$xml->status);
                case 'FS_NODE_BLOCKED':
                    return array(false,"Server: ".$xml->status);
                case 'FS_NODE_DOES_NOT_EXIST':
                    return array(false,"Server: ".$xml->status);
                case 'FS_TIMEOUT':
                    return array(false,"Server: ".$xml->status);
                case 'FS_LIST_END':
                    return array(false,"Server: ".$xml->status);
                default:
                    return array(false,"Server: ".$xml->status);
            }
        }
        
        return $return;
    }
    



    /**
     *  Adds the current Date as Prefix to the message
     *
     *  @var string $message - the message
     *
     *  @return string - the message with a date-prefix
     *
     */
    function ioDater($message){
        return date("Y-m-d H:i:s")." ".$message."\n";
    }
    

    /**
     *  Writes logs to whatever
     *
     *  @var string $message - the message
     *
     *  @var string $message - the loglevel of the message
     *
     *  @var string $message - the target (where to log to)
     *
     */
    function ioLogger($message,$level,$target = null){
        /*
         *  0 = off
         *  1 = Error
         *  2 = warning
         *  3 = debug
         *  4 = insane
         */
        $loglevel = $this->loglevel;
        if($loglevel >= $level){
            // where to log
            $logtarget = $this->logtarget;
            if($target != null){
                $logtarget = $target;
            }
            if($logtarget !== FALSE){
                // trace lines in debug and insane
                $trace_lines = "";
                if($loglevel > 3){
                    $traces = debug_backtrace();
                    foreach($traces as $trace){
                            $trace_lines .= "Trace: ".$trace['file']." Line ".$trace['line']."\n";
                    }
                }
                switch($logtarget){
                    case 'ECHO':
                            echo var_export($message,true);
                        break;
                    case 'STDERR':
                            file_put_contents('php://stderr', $this->ioDater($trace_lines.var_export($message,true)));
                        break;
                    case 'STDOUT':
                            file_put_contents('php://stdout', $this->ioDater($trace_lines.var_export($message,true)));
                        break;
                    default:
                            file_put_contents($logtarget, $this->ioDater($trace_lines.var_export($message,true)),FILE_APPEND);
                        break;  
                }
            }
        }
    }
}
?>
