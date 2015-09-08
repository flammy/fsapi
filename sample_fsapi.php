<?php
function __autoload($class_name) {
    include 'classes/'.$class_name . '.php';
}

/**
  * Basics
  */
	// create object from fsapi
	$fsapi = new fsapi();
	// set the pin for the device
	$fsapi->setpin(1337);
	// set the hostname for the device
	$fsapi->sethost('192.168.0.111');
	//  open a new session
	$response = $fsapi->call('CREATE_SESSION');
	// and save it to the the object
	if($response[0] !== false){
		$fsapi->setsid($response[1]);
	}

/**
  * Internal lists
  */

	// get all known nodes and the allowed methods
	$fsapi->getrw();
	// get all validation rules for known nodes
	$this->fsapi->getvalidation();


/**
  * First interaction
  * 
  * See https://github.com/flammy/fsapi/blob/master/FSAPI.md for a detailed api documentation for the fsapi
  */

	// get the value from the node 
	$fsapi->call('GET','netRemote.sys.audio.mute');

	// sets the value of the node
	$fsapi->call('SET','netRemote.sys.audio.mute',array('value' => true));

	// gets a list of valid radio modes from the radio
	$fsapi->call('LIST_GET_NEXT','netRemote.sys.caps.validModes',array('maxItems' => 100), -1);


/**
  * Logging
  */

	// set the logger to log to stdout
	$fsapi->setlogtarget('STDOUT');
	// set the level at which the log is written to the log target (STDOUT)
	$fsapi->setloglevel(2);
	// log AA to log target (STDOUT)
	$fsapi->ioLogger('AA',2);
	// dont log the array to log target (STDOUT) because loglevel is to high
	$fsapi->ioLogger(array('aa'=>'bb','cc' => 'dd'),3);

?>
