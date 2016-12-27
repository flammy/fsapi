<?php
class Radio{
	protected $host = null;
	protected $pin = null;
	protected $sid = null;
	
	protected $lists = array();
	
	protected $fmFreqRangeLower = null;
	protected $fmFreqRangeUpper = null;
	
	protected $Request = null;
	
    public function __construct($host,$pin){
		$this->Request 	= new Request;
        $this->host		= $host;
		$this->pin		= $pin;
		$this->sid 		= $this->Request->Call('CREATE_SESSION');
    }
	
	
	public function getSet($node, $value = null){
		if($value !== null){
			 $this->Request->Call('SET',$node,array('value' => $value));
		}
		return $this->ConvertResult($this->Request->Call('GET',$node));
	}
	
	
	public function getSetList($list, $node, $value = null){
		if(!isset($this->$list)){
			throw new RadioException(sprintf('List not found (%s).', $list));
		}
		$modes = $this->lists;
		if(!isset($mode[$node])){
			 $mode[$node] = $this->UpdateList($node);
		}
		if($value !== null){
			// update
		}
		// response
	}
	
	
	protected function UpdateList($node){
		$list = $this->lists;
		$list[$node] =  $this->Request->Call('LIST_GET_NEXT',$node,array('maxItems' => 100), -1);
		$this->lists = $list;
		return $list[$node];
	}
	
	
	protected function ConvertResult($node,$result){
			return $result;
	}
	
	
}
// pin, ssid