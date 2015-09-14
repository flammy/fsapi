<?php
date_default_timezone_set('Europe/Paris');

function __autoload($class_name) {
    include 'classes/'.$class_name . '.php';
}



class radio{
	/** @var obj $fsapi       		FSAPI-Object */
	protected $fsapi;
	/** @var int $pin	      		pin of the radio  */
	protected $pin = null;
	/** @var string $pin	      	hostname or ip of the radio  */
	protected $host = null;
	/** @var string $sid	      	session-id we got after login  */
	protected $sid = null;
	/** @var int $fmFreqRangeLower	      	highest possible fm-frecency  */
	protected $fmFreqRangeLower = 0;
	/** @var int $fmFreqRangeUpper	      	lowest possible fm-frecency  */
	protected $fmFreqRangeUpper = 0;
	
	/** @var array $eqs	      		list of possible eqs-presets (got from radio) */
	protected $eqs = array();
	/** @var array $modes	      	list of possible radio-modes (got from radio)   */
	protected $modes = array();

	
	/** @var array $states	      	list of possible play-states predefined number translation)  */
   protected $states = array(
            0 => 'stopped',
            1 => 'loading',
            2 => 'playing',
            3 => 'paused',
            4 => 'buffering',
            5 => 'unknown'
   );
	/** @var array $controls	     list of possible play-controls (predefined number translation)  */
	protected $controls = array(
            0 => 'stop',
            1 => 'play',
            2 => 'pause',
            3 => 'next',
            4 => 'previous'
   ); 
        
         
	/** @var array $convert 	     x-list of nodes which should be converted in a normalized format */
	protected $convert  = array(
            'netRemote.sys.audio.eqPreset' => 'eqs',
            'netRemote.play.status' => 'states',
            'netRemote.sys.mode' => 'modes',
            'netRemote.sys.net.ipConfig.address' => 'ip',
            'netRemote.sys.net.ipConfig.subnetMask' => 'ip',
            'netRemote.sys.net.ipConfig.gateway' => 'ip',
            'netRemote.sys.net.ipConfig.dnsPrimary' => 'ip',
            'netRemote.sys.net.ipConfig.dnsSecondary' => 'ip',
            'netRemote.sys.net.wired.interfaceEnable' => 'onoff',
            'netRemote.sys.net.wlan.interfaceEnable' => 'onoff',
            'netRemote.sys.net.ipConfig.dhcp' => 'onoff',
            'netRemote.sys.power' => 'onoff',
			'netRemote.sys.audio.mute' => 'onoff',
            'netRemote.play.scrobble' => 'onoff',
            'netRemote.play.repeat' => 'onoff',
            'netRemote.play.shuffle' => 'onoff',
            'netRemote.play.control' => 'controls',
			'netRemote.sys.clock.localDate' => 'time',
			'netRemote.sys.clock.localTime' => 'time'
   );
        

       
	/**
	 *	constructor class, sets protected fsapi
	 *
	 */

   function __construct() {
		$this->fsapi = new fsapi();
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
   }

	/**
	 *	sets the local and the protected pin variable
	 *
	 *	@var int $pin 				the pin of the device
	 *
	 */
    public function setpin($pin){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $this->pin = $pin;
        $response = $this->fsapi->setpin($pin);
		$this->debug($response,4);
    }
	
	/**
	 *	sets the local and the protected host variable
	 *
	 *	@var string $host 				the hostname of the device
	 *
	 */
    public function sethost($host){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $this->host = $host;
        $response = $this->fsapi->sethost($host);
		$this->debug($response,4);
    }
   
   
	/**
	 *	checks for login credentials and provides the session to the device
	 *
	 *	@return array first parameter: bool success, second parameter: string error message
	 *
	 */
    public function check_credentials(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
		$getpin = $this->fsapi->getpin();
		$this->debug($getpin,4);
      if($getpin == null){
        if($this->pin != null){
            $this->setpin($this->pin);
        }else{
            return array(false,'no pin set');
        }
      }

	  $gethost = $this->fsapi->gethost();
	  $this->debug($gethost,4);
      if($gethost == null){
        if($this->host != null){
            $this->sethost($this->host);
        }else{
            return array(false,'no host set');
        }
      }
      $sid = $this->fsapi->getsid();
      if($sid == null){
	      $response = $this->fsapi->call('CREATE_SESSION');
	      if($response[0] == false){
	       return $response;
	      }
	      $this->fsapi->setsid($response[1]);
      }
      return array(true);
    }
   
   
	/**
	 *	collect all GETtable node-values from the device
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function system_status(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $rw = $this->fsapi->getrw();
		$this->debug($rw,4);
        $system = array();
        foreach($rw as $node => $options){
            if(in_array("GET",$options)){
                $response  = $this->getSet($node);
                //print_r($response);
                if($response[0]){
                    $system[$node] = $response[1];
                }
            }
        }
        return array(true,$system);
    }



	/**
	 *	gets / sets a value of a node 
	 *
	 *	@var string $node 				the name of the node
	 *
	 *	@var string $value 				new value for the node (if not set it returns the current status)
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || current value of the node)
	 *
	 */
    public function getSet($node, $value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        if($value !== null){
            $response  = $this->fsapi->call('SET',$node,array('value' => $value));
            $this->debug($response,4);
			if(!$response[0]){
                return $response;
            }
        }
        $response  = $this->fsapi->call('GET',$node);
		$this->debug($response,4);
        if(!$response[0]){
            return $response;
        }
        $convert = $this->convert;
        if(isset($convert[$node])){
            switch($convert[$node]){
                case "eqs":
		    $this->updateEqs();
                    $eqs = $this->eqs;
                    if(isset($eqs[$response[1]])){
                        return array(true,$eqs[$response[1]]);
                    }
                    break;
                case "states":
                    $states = $this->states;
                    if(isset($states[$response[1]])){
                        return array(true,$states[$response[1]]);
                    }
                    break;
                case "modes":
		    $this->updateModes();
		    $modes = $this->modes;
                    if(isset($modes[$response[1]])){
                        return array(true,$modes[$response[1]]);
                    }
                    break;
                case "ip":
                    if($ip = long2ip($response[1])){
                        return array(true,$ip);
                    }
                break;
                case "onoff":
                    return array(true,($response[1] == 1 ? 'on' : 'off'));
                break;
				case 'time':
					// php does support XML-RPC Style
					$ts = strtotime($response[1]);
					// Format as time or date
					if(strlen($response[1]) == 6){
						return array(true,date("H:i:s",$ts));
					}else{
						return array(true,date("Y-m-d",$ts));
					}
				break;
                case "controls":
                    $controls = $this->controls;
                    if(isset($controls[$response[1]])){
                        return array(true,$controls[$response[1]]);
                    }
                    break;
            }
        }
        return $response; 
    }
    
   
	/**
	 *	gets a list of available modes from the device 
	 *
	 */
	public function updateModes(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
	    if(count($this->modes) < 1){
		    $modes = $this->validModes();
		    foreach($modes[1] as $id => $mode){
				if($mode['selectable'] == 1){
					$valid_modes[$id] = $mode['label'];
				}
		    }
		    $this->modes = $valid_modes;
		    $validation = $this->fsapi->getvalidation();
			$this->debug($validation,4);
		    $validation['netRemote.sys.mode'] = array('between',array(min(array_keys($valid_modes)),max(array_keys($valid_modes))));
		    $setvalidation = $this->fsapi->setvalidation($validation);
			$this->debug($setvalidation,4);
	     }
	}


	/**
	 *	gets a list of available eqs-presets from the device 
	 *
	 */
	public function updateEqs(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
	    if(count($this->eqs) < 1){
		    $eqs = $this->eqPresets();
		    foreach($eqs[1] as $id => $eq){
			$valid_eqs[$id] = $eq['label'];
		    }
		    $this->eqs = $valid_eqs;
		    $validation = $this->fsapi->getvalidation();
			$this->debug($validation,4);
		    $validation['netRemote.sys.audio.eqPreset'] = array('between',array(min(array_keys($valid_eqs)),max(array_keys($valid_eqs))));
		    $setvalidation = $this->fsapi->setvalidation($validation);
			$this->debug($setvalidation,4);
	     }
	}


   
	/**
	 *	get / set an list entry from preset-lists (modes, eqs ...)
	 *
	 *	@var string $list 				name of the list
	 *
	 *	@var string $node 				name of the node
	 *
	 *	@var string $value 				id of the mode (if not set it returns only the name)
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function getSetList($list, $node, $value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
      
 	if($value !== null){
		    

	   if($list == "modes"){
		$this->updateModes();
	   }
	   if($list == "eqs"){

		$this->updateEqs();
	    }
            $mode = $this->$list;
            if(!is_numeric($value)){
                $eqs_num = array_search($value,$mode);
                if($eqs_num === false){
                    return array(false,'eq '.$value.' not found');
                }
                $value = $eqs_num;
            }elseif(!isset($mode[$value])){
                return array(false, $list.': '.$value.' not found');
            }
        }
        return $this->getSet($node,$value);
    }

	/**
	 *	Toggles the value of a boolean node
	 *
	 *	This Function reads the value from the device and sets the inverted value back to the device
	 *
	 *	@var string $node 				name of the node
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function toggle($node){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $response  = $this->fsapi->call('GET',$node);
		$this->debug($response,4);
        if(!$response[0]){
            return $response;
        }
        return $this->getSet($node, !$response[1]);
    }

   /*
    * Ändert die Lautsärke (setzen oder up / down)
    */
   
   
   
   
	/**
	 *	Sets the volume of the device
	 *
	 *	@var string $value 				new volume level (e.g.: 0-20) or comand as string (up / down)
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function volume($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        if(is_numeric($value)){
            return $this->getSet('netRemote.sys.audio.volume',$value);
        }else{
            $result = $this->getSet('netRemote.sys.audio.volume');
            if(!$result[0]){
                return $result;
            }
            $volume = $result[1];
            switch($value){
                case "up":
                    $volume++;
                    break;
                case "down":
                    $volume--;
                    break;
            }
            return $this->getSet('netRemote.sys.audio.volume',$volume);
        }
    }

	
	/**
	 *	Sets the friendly_name of the device
	 *
	 *	@var string $value 				new friendly_name for the device
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function friendly_name($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        return $this->getSet('netRemote.sys.info.friendlyName',$value);
    }
   
   
	/**
	 *	Toggles the mute state
	 *
	 *	@var string $value 				string "toggle" to invert current state or bool 0/1
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function mute($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        if($value === 'toggle'){
            return $this->toggle('netRemote.sys.audio.mute');
        }else{
            return $this->getSet('netRemote.sys.audio.mute',$value);
        }
    }

	/**
	 *	Toggles the power state
	 *
	 *	@var string $value 				string "toggle" to invert current state or bool 0/1
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function power($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        if($value === 'toggle'){
            return $this->toggle('netRemote.sys.power');
        }else{
            return $this->getSet('netRemote.sys.power',$value);
        }
    }


	/**
	 *	sets eq-preset
	 *
	 *	@var int $value 				id of the eq-preset
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function eq_preset($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        return $this->getSetList('eqs', 'netRemote.sys.audio.eqPreset',$value);
    }

	
	

	/*
	 * sets an favorite radio station for the current mode
	 *
	 * @var int $value 				id of the favorite
	 *
	 * @return array first parameter: bool success, second parameter: string (error message || result)
	 * 
	 */
    public function SelectFavorite($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $this->navState(1);
        $response = $this->getSet('netRemote.nav.action.selectPreset',$value);
        $this->navState(0);
        return $response;
    }
	
	
	/**
	 *	sets device system-mode
	 *
	 *	@var int $value 				id of the mode
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function mode($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        return $this->getSetList('modes', 'netRemote.sys.mode',$value);
    }
	
	
	/**
	 *	sets device play-state
	 *
	 *	@var int $value 				id of the play-state
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function control($value = null){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        return $this->getSetList('controls', 'netRemote.play.control',$value);
    }


	/**
	 *	gets a list of available dab frequencies
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function dabFreqList(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.dabFreqList',array('maxItems' => 1000), -1);
		$this->debug($response,4);
        return $response;
    }
    

	/**
	 *	gets a list of configured eq-values
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function eqBands(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.eqBands',array('maxItems' => 100), -1);
		$this->debug($response,4);
        return $response;
    }
    
	/**
	 *	gets a list of available system-modes
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function validModes(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.validModes',array('maxItems' => 100), -1);
		$this->debug($response,4);
        return $response;
    }


	/**
	 *	gets a list of available eq-presets
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function eqPresets(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.eqPresets',array('maxItems' => 100), -1);
		$this->debug($response,4);
        return $response;
    }



   
	/**
	 *	Tunes to a FM-Frequency
	 *
	 *	@var int $value 				fm-frequency as mhz: 96.7 or hz: 96700
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
	public function radioFrequency($value){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
		if($this->fmFreqRangeLower == 0){
			$response = $this->getSet('netRemote.sys.caps.fmFreqRange.lower');
			$this->fmFreqRangeLower = $response[1];
		}
		if($this->fmFreqRangeUpper == 0){
			$response = $this->getSet('netRemote.sys.caps.fmFreqRange.upper');
			$this->fmFreqRangeUpper = $response[1];
		}
			$cre = $this->check_credentials();
			if($cre[0] == false){
				return $cre;
			}
		if(($value <= $this->fmFreqRangeLower) && (($value * 1000) <= $this->fmFreqRangeUpper)){
			// Correction to fill in normal mhz
			$value = $value * 1000;
		}
	
		if(($value < $this->fmFreqRangeLower) || ($value > $this->fmFreqRangeUpper)){
			return array(false,'frequency out of band');
		}
	
		return $this->getSet('netRemote.play.frequency',$value);
	}





	/**
	 *	Toggles Nav-State
	 *
	 *	@var bool $value 				enable or disable nav.state (0/1)
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
	public function navState($value = null){
			$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
			$cre = $this->check_credentials();
			if($cre[0] == false){
				return $cre;
			}
	
		$response = $this->getSet('netRemote.nav.state',$value);
		return $response;
	}



	/**
	 *	Get a list of favorite Radio Stations for the current mode
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */

    public function NavPresets(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $this->navState(1);
        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.nav.presets',array('maxItems' => 20), -1);
		$this->debug($response,4);
        $this->navState(0);
        return $response;
    }




   /*
    * Get a list of navigation Items for music archive and dab 
    *
    * @return array first parameter: bool success, second parameter: string (error message || result)
    * 
    */
    public function NavLists(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
		$this->navState(1);
        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.nav.list',array('maxItems' => 20), -1);
		$this->navState(0);
		$this->debug($response,4);
        return $response;
    }


	/* Incomplete Functions
	 *
	 * There are problems with the following functions or they are not tested yet.
	 *
	 * Please feeld free to contribute to the testing.
	 *
	 */







   /*
    * I dont know what this function does:  
    *
    * There is a 6 in my wireshark logs
    *
    * If i test manualy it returns -1 on dab, 0 on fm, 0 on aux, 0 on internetradio but 1 on music archive 
    *
    */

	public function numItems(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
		$cre = $this->check_credentials();
		if($cre[0] == false){
			return $cre;
		}
		$this->navState(1);
		$response = $this->getSet('netRemote.nav.numItems');
		$this->navState(0);
		return $response;
	}



function selectNavItem($item){
	$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
		$cre = $this->check_credentials();
		if($cre[0] == false){
			return $cre;
		}
		$this->navState(1);
		$response = $this->getSet('netRemote.nav.action.selectItem',$item);
		$this->navState(0);
		return $response;
}




   /*
    * I dont know what this function does, it returns FS_TIMEOUT in all cases
    *
    * This function is called verry often in normal operation
    * 
    */
	public function notifies(){
		$this->debug("Running ".__FUNCTION__." with: ".var_export(func_get_args(),true),3);
		$cre = $this->check_credentials();
		if($cre[0] == false){
			return $cre;
		}
		$this->navState(1);
		$response = $this->fsapi->call('GET_NOTIFIES');
		$this->navState(0);
		$this->debug($response,4);
		return $response;
	}
	
	
	public function debug($message,$loglevel){
		$this->fsapi->ioLogger($message,$loglevel);
	}
	public function setDebugLevel($loglevel){
		$this->fsapi->setloglevel($loglevel);
	}
	public function setDebugTarget($logtarget){
		$this->fsapi->setlogtarget($logtarget);
	}

	public function devicescan(){
		$ssdp = new ssdp;
		$ssdp->setDeviceType('urn:schemas-frontier-silicon-com:fs_reference:fsapi:1');
		$res = $ssdp->scan();
		return $res;
	}




}

?>
