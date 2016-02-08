<?php
namespace LIB;
class lib_system extends \LIB\lib_jscss{
    public static function get_class(){
        return self::class;}
    public static function js_path(){
        return new \SYSTEM\PLIB('/system/lib/system.js');}
    public static function css_path(){
        return new \SYSTEM\PLIB('/system/lib/system.css');}
    public static function version(){
        return 'pre alpha';}
}
