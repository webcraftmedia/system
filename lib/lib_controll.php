<?php
namespace LIB;
class lib_controll {
    private static $libs = array();
    private static function check_lib($lib){
        if( !\class_exists($lib) ||
            !\is_array($parents = \class_parents($lib)) ||
            !\array_search('LIB\lib', $parents)){
            return false;}
        return true;}
        
    public static function register($classname){
        if(!self::check_lib($classname)){
            throw new \SYSTEM\LOG\ERROR('Problem with your lib class: '.$classname.'; it might not be available or inherits from the wrong class!');}
        array_push(self::$libs,$classname);
    }
    
    public static function all(){
        return self::$libs;}
}