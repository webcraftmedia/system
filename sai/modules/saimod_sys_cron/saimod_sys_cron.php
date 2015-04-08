<?php
namespace SYSTEM\SAI;

class saimod_sys_cron extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_cron(){
        $vars = array();
        $vars['content'] = '';
        $vars['last_visit'] = \SYSTEM\CRON\cron::last_visit();
        $res = \SYSTEM\DBD\SYS_SAIMOD_CRON::QQ();
        $i = 0;
        while($r = $res->next()){
            $r['selected_0'] = $r['selected_1'] = $r['selected_2'] = $r['selected_3'] = '';
            $r['next'] = date('Y-m-d H:i:s',\SYSTEM\CRON\cron::next($r['class']));
            $r['selected_'.$r['status']] = 'selected';
            $r['i'] = $i++;
            $vars['content'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_cron/tpl/list_entry.tpl'), $r);}   
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_cron/tpl/tabs.tpl'), $vars);
    }
    
    public static function sai_mod__system_sai_saimod_sys_cron_action_change($cls,$status){
        if(!\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_CRON)){
            throw new \SYSTEM\LOG\ERROR("You dont have edit Rights - Cant proceeed");}
        \SYSTEM\DBD\SYS_SAIMOD_CRON_CHANGE::QI(array($status, $cls));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function sai_mod__system_sai_saimod_sys_cron_action_add($cls,$min,$hour,$day,$day_week,$month){
        if(!\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_CRON)){
            throw new \SYSTEM\LOG\ERROR("You dont have edit Rights - Cant proceeed");}
        if(!\SYSTEM\CRON\cron::check($cls)){
            throw new \SYSTEM\LOG\ERROR("Given Class is not a CronJob");}
        \SYSTEM\DBD\SYS_SAIMOD_CRON_ADD::QI(array($cls,$min,$hour,$day,$day_week,$month));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function sai_mod__system_sai_saimod_sys_cron_action_del($cls){
        if(!\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_CRON)){
            throw new \SYSTEM\LOG\ERROR("You dont have edit Rights - Cant proceeed");}
        \SYSTEM\DBD\SYS_SAIMOD_CRON_DEL::QI(array($cls));
        return \SYSTEM\LOG\JsonResult::ok();}
    
    public static function html_li_menu(){return '<li><a id="menu_cron" href="#!cron">Cron</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_CRON);}
    
    public static function css(){
        return array(  \SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_cron/css/saimod_sys_cron.css'));}
    public static function js(){
        return array(  \SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_cron/js/saimod_sys_cron.js'));}
}