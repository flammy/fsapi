<?php

namespace FSAPI\Nodes;

class NodesFactory
{

	private $all_nodes = array();

	public function __construct(){
		$this->all_nodes  = $this->getAllNodes();
	}


	public function getNodeByName($name){
		if(is_object($name) && $name instanceof Node){
			return $name;
		}
		
		$nodes = $this->getAllNodes();
		$key = array_search($name, $nodes);
		if($key !== false){
			return new $nodes[$key];
		}
		$nodes = array_flip($nodes);
		$key = array_search($name, $nodes);
		if($key !== false){
			return new $key;
		}
		throw new NodesFactoryException(sprintf('Node %s not found.', $name));
	}
	public function getAllNodes(){
		$all_nodes = array();
		$basedir =  dirname(__FILE__)."/Nodes/";
		$files = scandir($basedir);
		
		foreach($files as $file){
			$pathinfo = pathinfo($file);
			if(!is_dir($basedir.$file) && $pathinfo['extension'] == 'php'){
				$node = new $pathinfo['filename'];
				$all_nodes[$node->getPath()] = $pathinfo['filename'];
			}
		}
		return $all_nodes;
	}
}