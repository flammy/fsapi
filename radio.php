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

   protected $eqs = array(
            0 => 'user',
            1 => 'normal',
            2 => 'rock',
            3 => 'classic',
            4 => 'jazz',
            5 => 'pop',
            );


    protected $modes = array(
            0 => 'internet',
            1 => 'music', 
            2 => 'dab', 
            3 => 'fm', 
            4 => 'aux'
        );

    protected $states = array(
            0 => 'stopped',
            1 => 'unknown',
            2 => 'playing',
            3 => 'paused'
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
            'netRemote.play.scrobble' => 'onoff',
            'netRemote.play.repeat' => 'onoff',
            'netRemote.play.shuffle' => 'onoff',
        );
        
        
        
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
                    echo "\n\nmode\n\n";
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
            }
        }
        return $response; 
    }
    

    public function getSetList($list, $node, $value = null){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        if($value !== null){
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



    public function friendly_name($value = null){
        return $this->getSet('netRemote.sys.info.friendlyName',$value);
    }

    public function mute($value = null){
        if($value === null){
            return $this->toggle('netRemote.sys.audio.mute');
        }else{
            return $this->getSet('netRemote.sys.audio.mute',$value);
        }
    }

    public function power($value = null){
        if($value === null){
            return $this->toggle('netRemote.sys.power');
        }else{
            return $this->getSet('netRemote.sys.power',$value);
        }
    }


    public function eq_preset($value = null){
        return $this->getSetList('eqs', 'netRemote.sys.audio.eqPreset',$value);
    }


    public function mode($value = null){
        return $this->getSetList('modes', 'netRemote.sys.mode',$value);
    }



    public function dab_scan(){
        $cre = $this->check_credentials();
        if($cre[0] == false){
            return $cre;
        }
        $response = $this->mode('dab');
        if(!$response[0]){
            return $response[1];
        }
        $response  = $this->fsapi->call('GET','netRemote.nav.action.dabScan');
       
        if(!$response[0]){
            return $response[1];
        }
        $response  = $this->fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.dabFreqList',array('maxItems' => 100), -1);
        return $response;
    }
    

}

?>
