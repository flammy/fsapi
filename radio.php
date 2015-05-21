<?php
date_default_timezone_set('Europe/Paris');

function __autoload($class_name) {
    include 'classes/'.$class_name . '.php';
}



class radio{
   protected $fsapi;
   protected $pin = null;
   protected $host = null;
   protected $sid = null;

   protected $eqs = array();
   protected $modes = array();
   protected $states = array(
            0 => 'stopped',
            1 => 'loading',
            2 => 'playing',
            3 => 'paused',
            4 => 'buffering',
            5 => 'unknown'
   );
        
   protected $controls = array(
            0 => 'stop',
            1 => 'play',
            2 => 'pause',
            3 => 'next',
            4 => 'previous'
   ); 
        
        
        

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
            'netRemote.play.control' => 'controls'
   );
        
   protected $fmFreqRangeLower = 0;
   protected $fmFreqRangeUpper = 0;
       
        
   function __construct() {
      $this->fsapi = new fsapi();
   }

    public function setpin($pin){
        $this->pin = $pin;
        $this->fsapi->setpin($pin);
    }

    public function sethost($host){
        $this->host = $host;
        $this->fsapi->sethost($host);
    }

   /*
    * Diese Funktion kümmert sich darum das alle Basisinformationen gesetzt sind und eine Session bereitgestellt wird
    */

    public function check_credentials(){
      if($this->fsapi->getpin() == null){
        if($this->pin != null){
            $this->setpin($this->pin);
        }else{
            return array(false,'no pin set');
        }
      }

      if($this->fsapi->gethost() == null){
        if($this->host != null){
            $this->sethost($this->host);
        }else{
            return array(false,'no host set');
        }
      }

      return array(true);
    }


   /*
    * Holt alle aus dem Radio auslesbaren Einzelwerte 
    */

    public function system_status(){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $rw = $this->fsapi->getrw();
        $system = array();
        foreach($rw as $node => $options){
            if(in_array("GET",$options)){
                $response  = $this->getSet($node);
                if($response[0]){
                    $system[$node] = $response[1];
                }
            }
        }
        return array(true,$system);
        
    
    }


   /*
    * Setzt den Wer eines Nodes und / oder holt ihn
    */

    public function getSet($node, $value = null){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        if($value !== null){
            $response  = $this->fsapi->call('SET',$node,array('value' => $value));
            if(!$response[0]){
                return $response;
            }
        }
        $response  = $this->fsapi->call('GET',$node);
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
    

   /*
    * Updaten der lokalen Mode Liste
    */
	public function updateModes(){
	    if(count($this->modes) < 1){
		    $modes = $this->validModes();
		    foreach($modes[1] as $id => $mode){
			if($mode['selectable'] == 1){
			$valid_modes[$id] = $mode['label'];
			}

		    }
		    $this->modes = $valid_modes;
		    $validation = $this->fsapi->getvalidation();
		    $validation['netRemote.sys.mode'] = array('between',array(min(array_keys($valid_modes)),max(array_keys($valid_modes))));
		    $this->fsapi->setvalidation($validation);
	     }
	}


   /*
    * Updaten der lokalen EQS Liste
    */

	public function updateEqs(){
	    if(count($this->eqs) < 1){
		    $eqs = $this->eqPresets();
		    foreach($eqs[1] as $id => $eq){
			$valid_eqs[$id] = $eq['label'];
		    }
		    $this->eqs = $valid_eqs;
		    $validation = $this->fsapi->getvalidation();
		    $validation['netRemote.sys.audio.eqPreset'] = array('between',array(min(array_keys($valid_eqs)),max(array_keys($valid_eqs))));
		    $this->fsapi->setvalidation($validation);
	     }
	}



 
   /*
    * Interne Funktion zum setzen einer Preset-Liste, die durch das Radio bestimmt wird
    */

    public function getSetList($list, $node, $value = null){
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

   /*
    * wechselt den Zustand eines Nodes, der über einen Bool wert definiert ist
    */

    public function toggle($node){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $response  = $this->fsapi->call('GET',$node);
        if(!$response[0]){
            return $response;
        }
        return $this->getSet($node, !$response[1]);
    }

   /*
    * Ändert die Lautsärke (setzen oder up / down)
    */

    public function volume($value = null){
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

   /*
    * Ändert den Namen des Geräts
    */
    public function friendly_name($value = null){
        return $this->getSet('netRemote.sys.info.friendlyName',$value);
    }


   /*
    * schaltet den Ton des Geräts ein oder aus (auch als toggle)
    */

    public function mute($value = null){
        if($value === 'toggle'){
            return $this->toggle('netRemote.sys.audio.mute');
        }else{
            return $this->getSet('netRemote.sys.audio.mute',$value);
        }
    }

   /*
    * schaltet das Gerät ein oder aus (auch als toggle)
    */

    public function power($value = null){
        if($value === 'toggle'){
            return $this->toggle('netRemote.sys.power');
        }else{
            return $this->getSet('netRemote.sys.power',$value);
        }
    }


   /*
    * Setzt ein spezielles eq preset
    */

    public function eq_preset($value = null){
        return $this->getSetList('eqs', 'netRemote.sys.audio.eqPreset',$value);
    }

   /*
    * setzt den Modus des Geräts
    */

    public function mode($value = null){
        return $this->getSetList('modes', 'netRemote.sys.mode',$value);
    }


   /*
    * Zeigt die Einstellungen für Bass und höhen
    */

    public function dabFreqLis(){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.dabFreqList',array('maxItems' => 1000), -1);
        return $response;
    }
    

   /*
    * Zeigt die Einstellungen für Bass und höhen
    */

    public function eqBands(){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.eqBands',array('maxItems' => 100), -1);
        return $response;
    }
    
   /*
    * Holt eine Liste aller zulässigen Modi
    */

    public function validModes(){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.validModes',array('maxItems' => 100), -1);
        return $response;
    }


   /*
    * Holt eine Liste aller EQ Presets
    */

    public function eqPresets(){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.eqPresets',array('maxItems' => 100), -1);
        return $response;
    }




  /*
   * keine Ahnung (FS_NODE_BLOCKED)
   */

    public function NavLists(){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }

        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.nav.list',array('maxItems' => 20), -1);
        return $response;
    }




public function radioFrequency($value){
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

}

?>
