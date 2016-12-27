<?php
class Logger implements  Loggers
{
    
    protected $loglevel;
    protected $logtarget;
    protected $logdateformat;
    
    const EMERGENCY = 1;
    const ALERT     = 2;
    const CRITICAL  = 3;
    const ERROR     = 4;
    const WARNING   = 5;
    const NOTICE    = 6;
    const INFO      = 7;
    const DEBUG     = 8;
    
    
    public function __construct($loglevel = 4,$logtarget = 'Echo', $logdateformat = "Y-m-d H:i:s")
    {
        $this->loglevel = $loglevel;
        $this->logtarget = $logtarget;
        $this->logdateformat = $logdateformat;
    }
    
    public function addDate($message){
        return date($this->logdateformat)." ".$message."\n";
    }
    
    
    public function emergency($message, array $context = array()){
        $this->log(self::EMERGENCY, $message, $context);
    }
    
    
    public function alert($message, array $context = array()){
        $this->log(self::ALERT, $message, $context);
    }
    
    public function critical($message, array $context = array()){
        $this->log(self::CRITICAL, $message, $context);
    }
    
    public function error($message, array $context = array()){
        $this->log(self::ERROR, $message, $context);
    }
     
    public function warning($message, array $context = array()){
        $this->log(self::WARNING, $message, $context); 
    }
     
    public function info($message, array $context = array()){
        $this->log(self::INFO, $message, $context); 
    }
     
     public function notice($message, array $context = array()){
        $this->log(self::NOTICE, $message, $context); 
    }

     public function debug($message, array $context = array()){
        $this->log(self::DEBUG, $message, $context); 
    }
     
     public function log($level, $message, array $context = array()){
        if($this->loglevel >= $level){
            if($this->loglevel > self::NOTICE){
                $traces = debug_backtrace();
                foreach($traces as $trace){
                    $message .= "\nTrace: ".$trace['file']." Line ".$trace['line'];
                }
            }
            $method = 'Log'.ucfirst(strtolower($this->logtarget));
            if (class_exists($method)) {
                $Logger = new $method;
            }else{
                $Logger = new LogEcho;
            }
            return $Logger->log($level, $message, $context);
        }
        return false;
    }
}