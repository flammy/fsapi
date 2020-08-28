<?php

namespace FSAPI;

use FSAPI\Request\Request;

use FSAPI\Nodes\NodesFactory;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;


class Radio{
	
	protected $host = null;
	protected $pin = null;
	protected $sid = null;
    /**
     * @var LoggerInterface
     */
	private $logger = null;
	
	protected $lists = array();
	
	protected $fmFreqRangeLower = null;
	protected $fmFreqRangeUpper = null;
	
	protected $Request = null;
	protected $fsapi = null;
	protected $api_level = null;
	
    public function __construct($host,$pin){
        $this->host		= $host;
		$this->pin		= $pin;
		$this->Request 	= new Request($this->host,null,$this->pin);
		$this->fsapi 	= new FSAPI($this->Request);
		$this->sid 		= $this->fsapi->doRequest('CREATE_SESSION');
		$this->Request->setSID($this->sid);
		$this->api_level = 1;
		$this->logger = new NullLogger();
    }


    /**
     * Set a PSR-3 Logger
     * @param LoggerInterface $logger
     */
    public function setLogger($logger){
        if(method_exists($logger,'withName')){
            $logger = $logger->withName('Radio');
        }
        $this->logger = $logger;
        $this->fsapi->setLogger($logger);
    }


    /**
     * gets / sets the value of the specified node
     *
     * @param string $node name of the node
     *
     * @param mixed $value new value for the node
     * @return mixed the new value set to the node
     *
     * @throws RadioException
     */
	public function getSet($node, $value = null){
		$NodesFactory = new NodesFactory();
		$Node = $NodesFactory->getNodeByName($node);
		$Converter = $Node->getConverter();

        if($Node->getApiLevel() > $this->api_level){
            throw new RadioException(sprintf('Action is supported from API-Level %s, current API-Level is %s',$this->api_level,$Node->getApiLevel()));
        }
		
		if($value !== null){
			$value = $Converter->convertInput($value);
			return $this->fsapi->doRequest('SET',$node,array('value' => $value));
		}
		
		if(in_array('GET',$Node->getCallMethods())){
			$output = $this->fsapi->doRequest('GET',$node);
		}
		
		return $Converter->convertOutput($output);
	}
	
	
	
	/**
	 *	gets / sets the value of a list
	 *
	 *	@param string $node 				name of the node
	 *
	 *	@param mixed $value 				new value for the node
	 *
	 *	@return mixed the new list 
	 *
	 */
	public function getSetList($node, $value = null){
		$modes = $this->lists;
		if(!isset($modes[$node])){
			 $modes[$node] = $this->UpdateList($node);
		}
		// determine the item type
		$item_type = 0;
		if(isset($modes[$node][$value]['type'])){
			// if there is an item type use it to determine the setter
			$item_type = $modes[$node][$value]['type'];
		}
		
		if($value !== null){
			$NodesFactory = new NodesFactory();
            $Node = $NodesFactory->getNodeByName($node);
			$Setter = $Node->getSetter($item_type);
			$Converter = $Node->getConverter();
			$Converter->setTranslationTable($modes[$node]);
			
			$value = $Converter->convertInput($value);
			$this->getSet($Setter, $value);

			$modes[$node] = $this->UpdateList($node);
		}
		return $modes[$node];
	}

	
	/**
	 *	update the values of a list
	 *
	 *	@param string $node 				name of the node
	 *
	 *	@return mixed the new list 
	 *
	 */
	protected function UpdateList($node){
		$list = $this->lists;
		$list[$node] =  $this->fsapi->doRequest('LIST_GET_NEXT',$node,array('maxItems' => 100), -1);
		$this->lists = $list;
		return $list[$node];
	}

    /**
     *    collect all GETtable node-values from the device
     *
     * @param string $path
     * @return array with alle GETtable node-values
     *
     */
	public function systemStatus($path = NULL){
		$basedir =  dirname(__FILE__)."/Nodes/";
		$NodesFactory = new NodesFactory();
		$all_nodes = $NodesFactory->getAllNodes();
		$result = [];
		foreach($all_nodes as $file){
			$pathinfo = pathinfo($file);
			include_once($basedir.$file.'.php');
			$className = "FSAPI\\Nodes\\".$pathinfo['filename'];
			$node = new $className();
			if(($path !== NULL) && (preg_match("/^$path/",$node->getPath()) !== 1)){
				continue;
			}
			if($node->getApiLevel() !== $this->api_level){
				continue;
			}
			if(method_exists($node,'getCallMethods')){
				$call_methods = $node->getCallMethods();
				if(array_search('GET',$call_methods) !== FALSE){
					$result[$node->getPath()] = $this->getSet($node);
				}
			}
		}
		return $result;
	}
	
	/**
	 *	Toggles the value of a boolean node
	 *
	 *	This Function reads the value from the device and sets the inverted value back to the device
	 *
	 *	@param string $node 				name of the node
	 *
	 *	@return array first parameter: string result
	 *
	 */
    public function toggle($node){
		$response = $this->GetSet($node);
		
		return $this->GetSet($node,(($response == 1 || $response === 'on' )? 0 : 1));
    }
	
	
	/**
	 *	Sets the volume of the device
	 *
	 *	@param string $value 				new volume level (e.g.: 0-20) or comand as string (up / down)
	 *
	 *	@return array first parameter:  string result
	 *
	 */
    public function volume($value = null){
        if(is_numeric($value)){
            return $this->getSet('netRemote.sys.audio.volume',$value);
        }else{
            $volume = $this->getSet('netRemote.sys.audio.volume');
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
     * Tunes to a FM-Frequency
     *
     * @param int $value fm-frequency as mhz: 96.7 or hz: 96700
     * @return array first parameter: string result
     *
     * @throws RadioException
     */
	public function radioFrequency($value){
		$fmFreqRangeLower = $this->getSet('netRemote.sys.caps.fmFreqRange.lower');
		$fmFreqRangeUpper = $this->getSet('netRemote.sys.caps.fmFreqRange.upper');
	
		if(($value <= $fmFreqRangeLower) && (($value * 1000) <= $fmFreqRangeUpper)){
			// Correction to fill in normal mhz
			$value = $value * 1000;
		}
	
		if(($value < $fmFreqRangeLower) || ($value > $fmFreqRangeUpper)){
            throw new RadioException(sprintf('Frequency out of band'));
		}
	
		return $this->getSet('netRemote.play.frequency',$value);
	}
	
	
	/**
	 *	gets a list of available system-modes
	 *
	 *	@return array with the available system-modes
	 *
	 */
	public function listModes(){
		return $this->getSetList("netRemote.sys.caps.validModes");
	}
	
	
	/**
	 *	selects an entry from the modes-list
	 *
	 *	@param $id index of the list-entry
	 *
	 *	@return array with the updated list
	 *
	 */
	public function selectMode($id){
		return $this->getSetList("netRemote.sys.caps.validModes",$id);
	}
	
	
	
	/**
	 *	gets a list of available eq-presets
	 *
	 *	@return array with theavailable eq-presets
	 *
	 */
	public function listEqs(){
		return $this->getSetList("netRemote.sys.caps.eqPresets");
	}
	
	/**
	 *	selects an entry from the  eq-presets-list
	 *
	 *	@param $id index of the list-entry
	 *
	 *	@return array with the updated list
	 *
	 */
	public function selectEq($id){
		return $this->getSetList("netRemote.sys.caps.eqPresets",$id);
	}
	
	/**
	 *	Get a list of favorite marked entries e.g. Stations for the current mode
	 *
	 *	@return array with the list of the favorite entries
	 *
	 */
	public function listFavs(){
		return $this->getSetList("netRemote.nav.presets");
	}

	/**
	 *	selects an entry from the  favorites list
	 *
	 *	@param $id index of the list-entry
	 *
	 *	@return array with the updated list
	 *
	 */
	public function selectFav($id){
		return $this->getSetList("netRemote.nav.presets",$id);
	}
	
   /*
    * Get a list of navigation Items for music archive and dab 
    *
    * @return array with the list of the navigation items
    * 
    */
	public function listNavs(){
		return $this->getSetList("netRemote.nav.list");
	}
	
	/**
	 *	selects an entry from the  navigation list
	 *
	 *	@param $id index of the list-entry
	 *
	 *	@return array with the updated list
	 *
	 */
	public function selectNav($id){
		return $this->getSetList("netRemote.nav.list",$id);
	}
	
	/**
	 *	enables / disables navigation 
	 *
	 *	@param $value the new value for the node
	 *
	 *	@return int with the navigation state
	 *
	 */
	public function setNavState($value){
        if($value === null || $value === 'toggle'){
            return $this->toggle('netRemote.nav.state');
        }
        return $this->getSet('netRemote.nav.state',$value);
	}
	
   /*
    * Get a list of the current dab frequencies
    *
    * @return array with the list of the dab frequencies
    * 
    */
	public function listDabFreqs(){
		return $this->getSetList("netRemote.sys.caps.dabFreqList");
	}
	
   /*
    * Get a list of the current equalizer bands
    *
    * @return array with the list of the dav frequencies
    * 
    */
	public function listEqBands(){
		return $this->getSetList("netRemote.sys.caps.eqBands");
	}
	
   /*
    * Get the amount of navigation Items 
    *
    * @return int number of the navigation items for the current level
    * 
    */
	public function numItems(){
		return $this->getSet("netRemote.nav.numItems");
		
	}
	
	
	
	
	/**
	 *	Toggles the mute state
	 *
	 *	@param string $value 				string "toggle" to invert current state or bool 0/1
	 *
	 *	@return mixed the current value of the node
	 *
	 */
	public function mute($value){
        if($value === null || $value === 'toggle'){
            return $this->toggle('netRemote.sys.audio.mute');
        }
        return $this->getSet('netRemote.sys.audio.mute',$value);
    }
	
	
	/**
	 *	Toggles the power state
	 *
	 *	@param string $value 				string "toggle" to invert current state or bool 0/1
	 *
	 *	@return array first parameter: bool success, second parameter: string (error message || result)
	 *
	 */
    public function power($value = null){
        if($value === null || $value === 'toggle'){
            return $this->toggle('netRemote.sys.power');
        }
		return $this->getSet('netRemote.sys.power',$value);
    }
	
	
	

	/**
	 *	Toggles the shuffle state
	 *
	 *	@param string $value 				string "toggle" to invert current state or bool 0/1
	 *
	 *	@return mixed the current value of the node
	 *
	 */
    public function shuffle($value = null){
        if($value === null || $value === 'toggle'){
            return $this->toggle('netRemote.play.shuffle');
        }else{
            return $this->getSet('netRemote.play.shuffle',$value);
        }
    }
	
	
	
	/**
	 *	sets device play-state
	 *
	 *	@param int $value 				id or name of the play-state
	 *		 							0 => 'stop',
     *       							1 => 'play',
     *       							2 => 'pause',
     *       							3 => 'next',
     *       							4 => 'previous'
	 *
	 *	@return mixed the current value of the node
	 *
	 */
    public function control($value = null){
        return $this->getSet('netRemote.play.control',$value);
    }

	

	
	
}
