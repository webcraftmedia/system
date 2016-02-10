<?php
namespace SYSTEM\SAI;
class saimod_sys_cache extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_cache(){
        $vars = array();
        $vars['count'] = \SYSTEM\SQL\SYS_SAIMOD_CACHE_COUNT::Q1()['count'];
        $vars['entries'] = '';
        $res = \SYSTEM\SQL\SYS_SAIMOD_CACHE::QQ();
        while($r = $res->next()){
            $r['class'] = self::tablerow_class($r['cache']);
            $vars['entries'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_cache/tpl/saimod_sys_cache_entry.tpl'))->SERVERPATH(), $r);}
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_CACHE));
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_cache/tpl/saimod_sys_cache.tpl'))->SERVERPATH(), $vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_cache_action_clear(){
        return \SYSTEM\SQL\SYS_SAIMOD_CACHE_CLEAR::QI() ? \SYSTEM\LOG\JsonResult::ok() : \SYSTEM\LOG\JsonResult::fail();}
    
    private static function tablerow_class($cacheID){
        if($cacheID == 1){
            return 'info';}
        return 'success';}
    
    public static function html_li_menu(){return '<li><a id="menu_cache" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_cache}" href="#!cache"><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    //public static function css(){}
    public static function js(){
        return array(new \SYSTEM\PSAI('modules/saimod_sys_cache/js/saimod_sys_cache.js'));}
}