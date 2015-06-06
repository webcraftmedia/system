<?php
namespace LIB;
abstract class lib {
    public static function php(){
        if(!\method_exists(static::get_class(), 'php_autoload')){
            throw new \SYSTEM\LOG\ERROR('Function php_autoload not implemented in '.static::get_class());}
        return static::php_autoload();}
    public static function css(){
         if(!\method_exists(static::get_class(), 'css_path')){
            throw new \SYSTEM\LOG\ERROR('Function css_path not implemented in '.static::get_class());}
        return static::css_path(); //use tpl here? yes? any negative effex?
    }
    public static function js(){
         if(!\method_exists(static::get_class(), 'js_path')){
            throw new \SYSTEM\LOG\ERROR('Function js_path not implemented in '.static::get_class());}
        return static::js_path();
    }
}