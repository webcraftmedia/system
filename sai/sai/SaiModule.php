<?php
namespace SYSTEM\SAI;

class SaiModule extends \SYSTEM\API\api_default{
    public static function get_apigroup(){
        return 42;}
    public static function get_default_state(){
        return 'start';}
    public static function get_class($params = NULL){
        if(isset($params[\SYSTEM\SAI\saigui::SAI_MOD_POSTFIELD])){
            $classname = \str_replace('.', '\\', $params[\SYSTEM\SAI\saigui::SAI_MOD_POSTFIELD]);
            $mods = \SYSTEM\SAI\sai::getAllModules();        
            if( $classname &&
                \array_search($classname, $mods) !== false &&
                (   \call_user_func(array($classname, 'right_public')) ||
                    \call_user_func(array($classname, 'right_right')))){
                    return $classname;
                } else {    
                    return NULL;
                }
        }
        return self::class;    
    }
    public static function get_params($params){
        $params[\SYSTEM\SAI\saigui::SAI_MOD_POSTFIELD] = \str_replace('.', '_', $params[\SYSTEM\SAI\saigui::SAI_MOD_POSTFIELD]);
        return $params;}    
    public static function default_page($_escaped_fragment_ = null){
        return (new \SYSTEM\SAI\default_page())->html($_escaped_fragment_);}
    public static function html_li_menu(){
        throw new \RuntimeException("Unimplemented!");}
    //true or false -> if true no call to right_right()
    public static function right_public(){
        throw new \RuntimeException("Unimplemented!");}
    //check your rights here -> returns true or false
    public static function right_right(){
        throw new \RuntimeException("Unimplemented!");}
    
}