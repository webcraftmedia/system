<?php

namespace SYSTEM\LOG;

//Register this before every other handler, cuz this will need to handle every single error.
//And only the first ErrorHandler will be called if he returns true in CALL.
class error_handler_dbwriter extends \SYSTEM\LOG\error_handler {    
    public static function CALL(\Exception $E, $thrown){
        try{
            if(\property_exists(get_class($E), 'logged') && $E->logged){                
                return false;} //alrdy logged(this prevents proper thrown value for every system exception)
            
            \SYSTEM\SQL\SYS_LOG_INSERT::Q1( /*array(  get_class($E), $E->getMessage(), $E->getCode(), $E->getFile(), $E->getLine(), $E->getTraceAsString(),
                                                    getenv('REMOTE_ADDR'),round(microtime(true) - \SYSTEM\time::getStartTime(),5),
                                                    $_SERVER["SERVER_NAME"],$_SERVER["SERVER_PORT"],$_SERVER['REQUEST_URI'], serialize($_POST),
                                                    array_key_exists('HTTP_REFERER', $_SERVER) ? $_SERVER['HTTP_REFERER'] : null,
                                                    array_key_exists('HTTP_USER_AGENT',$_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : null,
                                                    ($user = \SYSTEM\SECURITY\Security::getUser()) ? $user->id : null, $thrown ? 1 : 0),*/
                                            array(  get_class($E), $E->getMessage(), $E->getCode(), $E->getFile(), $E->getLine(), $E->getTraceAsString(),
                                                    getenv('REMOTE_ADDR'),round(microtime(true) - \SYSTEM\time::getStartTime(),5),date('Y-m-d H:i:s', microtime(true)),
                                                    $_SERVER["SERVER_NAME"],$_SERVER["SERVER_PORT"],$_SERVER['REQUEST_URI'], serialize($_POST),
                                                    array_key_exists('HTTP_REFERER', $_SERVER) ? $_SERVER['HTTP_REFERER'] : null,
                                                    array_key_exists('HTTP_USER_AGENT',$_SERVER) ? $_SERVER['HTTP_USER_AGENT'] : null,
                                                    ($user = \SYSTEM\SECURITY\Security::getUser()) ? $user->id : null,$thrown));                        
            if(\property_exists(get_class($E), 'logged')){
                $E->logged = true;} //we just did log
        } catch (\Exception $E){return false;} //Error -> Ignore
        
        return false; //We just log and do not handle the error!
    }    
}