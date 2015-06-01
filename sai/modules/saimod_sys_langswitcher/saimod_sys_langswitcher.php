<?php
namespace SYSTEM\SAI;

class saimod_sys_langswitcher extends \SYSTEM\SAI\SaiModule {    
    public static function html_li_menu(){
        //return self::lang_menu('./sai.php');
        
    }
    public static function right_public(){return true;}    
    public static function right_right(){return true;}
    
    public static function lang_menu($endpoint = './api.php'){
        $result = '';
        $langs = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS);
        foreach($langs as $lang){
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_langswitcher/tpl/language.tpl'),array('lang' => $lang,'endpoint' => $endpoint));}
        return $result;
    }
    
    //public static function css(){}
    //public static function js(){}
}