<?php
namespace SYSTEM\SAI;

class saimod_sys_git extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_git(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_GIT);
        $vars = array_merge($vars,self::getGitInfo());
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_git/tpl/saimod_sys_git.tpl'), $vars);
    }
    
    public static function getGitInfo(){
        \LIB\lib_git::php();
        $result = array('git_project' => '', 'git_system' => '');
        try{
            $repo = \GIT\Git::open(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH));
            $result['git_project'] = '<a href="http://www.mojotrollz.eu/git/hosting/commit/'.$repo->run('rev-parse HEAD').'" target="_blank">'.$repo->run('rev-parse --short HEAD').'</a><br/>';
            $result['git_project'] .= $repo->run('log -1 --pretty=%B');
            
        } catch (\Exception $ex) {
            $result['git_project'] = $ex->getMessage();
        }
        
        try{
            $repo = \GIT\Git::open(\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH).\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL));
            $result['git_system'] .= '<li>';
            $result['git_system'] = '<a href="http://www.mojotrollz.eu/git/system/commit/'.$repo->run('rev-parse HEAD').'" target="_blank">'.$repo->run('rev-parse --short HEAD').'</a><br/>';
            $result['git_system'] .= $repo->run('log -1 --pretty=%B');
        } catch (\Exception $ex) {
            $result['git_system'] = $ex->getMessage();
        }
        return $result;
    }
    
    private static function tablerow_class($cacheID){
        if($cacheID == 1){
            return 'info';}
            
        return 'success';                
    }
    
    //public static function html_li_menu(){return '<li><a id="menu_git" href="#!git"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span>${sai_menu_git}</a></li>';}
    public static function html_li_menu(){return '</ul><ul class="nav navbar-nav navbar-right sai_divider_left"><li><a id="menu_git" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_git}" href="#!git"><span class="glyphicon glyphicon-saved" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    //public static function css(){}
    //public static function js(){}
}