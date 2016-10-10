<?php
class LogStdErr extends Logger implements  Loggers
{
    public function log($level, $message, array $context = array()){
        file_put_contents('php://stderr', $this->addDate($message));
    }
}
