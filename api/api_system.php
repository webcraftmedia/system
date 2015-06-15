<?php

namespace SYSTEM\API;

class api_system extends api_login{
    public static function call_cron(){
        return \SYSTEM\CRON\cron::run();}
    
    public static function call_text($request,$lang){        
        return \SYSTEM\LOG\JsonResult::toString(\SYSTEM\locale::getStrings($request, $lang));}
        
    public static function call_files($cat,$id = null){
        return \SYSTEM\FILES\files::get($cat, $id, true);}
        
    public static function call_pages($group,$state){
        return \SYSTEM\PAGE\State::get($group,$state);}
        
    public static function static__lang($lang){
        \SYSTEM\locale::set($lang);}        
    public static function static__result($result){
        \SYSTEM\CONFIG\config::set(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_RESULT, $result);}
        
    public static function call_bug($message,$data){
        return \SYSTEM\SAI\saimod_sys_todo::report($message,$data);}
}