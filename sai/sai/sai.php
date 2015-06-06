<?php

namespace SYSTEM\SAI;

class sai {
    private static $module_start = '\SYSTEM\SAI\saistart_sys_sai';
    private static $modules = array(); //only strings!
    private static $modules_sys = array(); //only strings!    

    private static function check_module($module){
        if( !\class_exists($module) ||
            !\is_array($parents = \class_parents($module)) ||
            !\array_search('SYSTEM\SAI\SaiModule', $parents)){
            return false;}
        return true;}    
        
    public static function register_start($module){
        if(!self::check_module($module)){
            throw new \SYSTEM\LOG\ERROR('Problem with your Sysmodule class: '.$module.'; it might not be available or inherits from the wrong class!');}
        self::$module_start = $module;}    
    public static function register($module){
        if(!self::check_module($module)){
            throw new \SYSTEM\LOG\ERROR('Problem with your Sysmodule class: '.$module.'; it might not be available or inherits from the wrong class!');}
        array_push(self::$modules,$module);}
    public static function register_sys($module){
        if(!self::check_module($module)){
            throw new \SYSTEM\LOG\ERROR('Problem with your Sysmodule class: '.$module.'; it might not be available or inherits from the wrong class!');}
        array_push(self::$modules_sys,$module);}    

    public static function getStartModule(){
        return self::$module_start;}
    public static function getModules(){
        return self::$modules;}
    public static function getSysModules(){
        return self::$modules_sys;}
    public static function getAllModules(){
        return array_merge(self::$modules_sys,self::$modules,array(self::$module_start));}
}