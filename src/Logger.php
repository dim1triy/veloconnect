<?php

// 
namespace Miechuliv\Veloconnect;

// 
use Miechuliv\Veloconnect;

/**
 * Class Logger 
 * 
 */
class Logger 
{
    /**
     * log
     * 
     * @param type $msg
     */
    static public function log($msg)
    {
        // 
        if (Veloconnect\Config::$LOG_ERRORS)
        {
            // 
            $functionName = Veloconnect\Config::$LOGGING_FUNCTION;
            // 
            Veloconnect\Config::$LOGGING_OBJECT->$functionName($msg);
        }
        
        // 
        if(Veloconnect\Config::$DISPLAY_ERRORS)
        {
            // 
            echo $msg;
        }
    }

} 