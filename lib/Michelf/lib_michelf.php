<?php
namespace LIB;
class lib_michelf extends \LIB\lib_php{
    public static function get_class($params = null){
        return self::class;}
        
    public static function php_autoload(){
        \SYSTEM\autoload::registerFolder(dirname(__FILE__).'/lib','Michelf');
        return true;}
}
