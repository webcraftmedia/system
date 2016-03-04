<?php
namespace SYSTEM\DOCU;

class docu {
    private static $phpdocconfigs = array();
    
    public static function register($phpdocconfig){
        array_push(self::$phpdocconfigs,$phpdocconfig);}
        
    public static function getAll(){
        return self::$phpdocconfigs;}
    
    public static function get($id){
        foreach(self::$phpdocconfigs as $config){
            if($config['id'] == $id){
                return $config;}
        }
        throw new ERROR('PhpDocConfig for id '.$id.' not found.');
    }

}