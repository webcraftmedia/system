<?php
namespace SYSTEM\LOG;

class TranslatableError extends \SYSTEM\LOG\ERROR {
    public function __construct($string_id, $code = 0, $previous = NULL , $locale = NULL){        
        $message = \SYSTEM\PAGE\text::get($string_id, $locale);        
        
        if(!$message){
            throw new \SYSTEM\LOG\ERROR("Could not retrive Errortranslation: ".$string_id);}
        
        parent::__construct($message, $code, $previous);        
    }
}
