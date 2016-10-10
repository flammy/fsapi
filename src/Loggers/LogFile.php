<?php
class LogFile extends Logger implements  Loggers
{
    public function log($level, $message, array $context = array()){
        file_put_contents($logtarget, $this->addDate($message),FILE_APPEND);
    }
}
