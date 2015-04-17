<?php
namespace SYSTEM;

class locale {    
    const SESSION_KEY = 'locale';        

    public static function set($lang){
        if(!self::isLang($lang)){
            return false;}

        \SYSTEM\SECURITY\Security::save(self::SESSION_KEY, $lang);
        if(\SYSTEM\SECURITY\Security::isLoggedIn()){
            $user = \SYSTEM\SECURITY\Security::getUser();
            $user->locale = $lang;
            \SYSTEM\DBD\SYS_LOCALE_SET_LOCALE::Q1(array($lang, $user->id));            
        }
            
        return true;
    }

    public static function get(){
        $value = \SYSTEM\SECURITY\Security::load(self::SESSION_KEY);
        if($value == NULL){
            return \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG);}

        return $value;
    }

    public static function isLang($lang){        
        if(!\in_array($lang, \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS))){
            return false;}
        return true;
    }
}