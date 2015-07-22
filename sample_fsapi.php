<?php
function __autoload($class_name) {
    include 'classes/'.$class_name . '.php';
}
$fsapi = new fsapi();
$fsapi->setlogtarget('STDOUT');
$fsapi->setloglevel(2);

$fsapi->ioLogger('AA',2);
$fsapi->ioLogger(array('aa'=>'bb','cc' => 'dd'),3);


?>
