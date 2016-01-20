<?php
namespace SYSTEM\SAI;

class saistart_sys_sai extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saistart_sys_sai(){
        $vars = array_merge(array(  'content' => self::html_content()),
                                    \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_START));
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saistart_sys_sai/tpl/saistart.tpl'))->SERVERPATH(),$vars);}
    //public static function html_li_menu(){return '<li class="active"><a id="menu_start" href="#">${sai_menu_start}</a></li>';}
    public static function html_li_menu(){return '<li class="active sai_menu_first"><a id="menu_start" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_start}" href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return true;}    
    public static function right_right(){return true;}
    
    public static function css(){
        return array(new \SYSTEM\PSAI('modules/saistart_sys_sai/css/saistart_sys_sai.css'));}
    public static function js(){
        return array(   new \SYSTEM\PSAI('modules/saistart_sys_sai/js/saistart_sys_sai.js'),
                        new \SYSTEM\PSAI('js/crypto/jquery.md5.js'),
                        new \SYSTEM\PSAI('js/crypto/jquery.sha1.js'),
                        \LIB\lib_jqbootstrapvalidation::js());
    }
    
    protected static function html_content(){
        //create timestamp
        $week_number = date("W", time());
        $date = date("l M Y", time());
        
        if(!\SYSTEM\SECURITY\Security::isLoggedIn() || !\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI)){
            return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saistart_sys_sai/tpl/content.tpl'))->SERVERPATH());}
        $vars = array();
        $vars['week_number'] = $week_number;
        $vars['date'] = $date;
        $vars['project_name'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT);
        $vars['project_url'] = \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL);
        $vars['analytics'] = \SYSTEM\SAI\saimod_sys_log::analytics();
        $user = \SYSTEM\SECURITY\Security::getUser();
        $vars['username'] = $user->username;
        $vars['locale'] = $user->locale;
        $vars['isadmin']  = \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI) ? "yes" : "no";
        $vars['userstats'] = '';
        $userstats = \SYSTEM\SQL\SYS_SAIMOD_TODO_STATS_USERS::QQ();
        while($stat = $userstats->next()){
            $stat['perc'] = round($stat['state_closed'] / ($stat['state_open']+$stat['state_closed']),2)*100;
            $vars['userstats'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_todo/tpl/todo_stats_users_entry.tpl'))->SERVERPATH(), $stat);
        }
        $vars = array_merge(    $vars,
                                \SYSTEM\SAI\saimod_sys_todo::statistics(),
                                \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_START),
                                \SYSTEM\SAI\saimod_sys_git::getGitInfo());
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saistart_sys_sai/tpl/content_loggedin.tpl'))->SERVERPATH(), $vars);
    }
}