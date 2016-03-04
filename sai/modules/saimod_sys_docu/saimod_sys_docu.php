<?php
namespace SYSTEM\SAI;
class saimod_sys_docu extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_docu(){
        $phpdocconfigs = \SYSTEM\DOCU\docu::getAll();
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_DOCU);
        $vars['tabopts'] = '';
        foreach($phpdocconfigs as $config){
            $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_docu/tpl/tabopt.tpl'))->SERVERPATH(), array('tab_id' => $config['id'],'tab_id_pretty' => $config['title']));}
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_docu/tpl/saimod_sys_docu.tpl'))->SERVERPATH(), $vars);
    }  
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_docu_action_generate(){
        \LIB\lib_phpdocumentor::php();
        $configs = \SYSTEM\DOCU\docu::getAll();
        foreach($configs as $config){
            \phpdocumentor::run(    $config['inpath'],
                                    $config['outpath'],
                                    $config['cachepath'],
                                    $config['ignore'],
                                    $config['title'],
                                    $config['sourcecode'],
                                    $config['parseprivate']);}
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_docu_action_cat($cat = 'system'){
        $vars = array('iframesrc' => \SYSTEM\DOCU\docu::get($cat)['outpath']->WEBPATH(false));
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_docu/tpl/saimod_sys_docu_iframe.tpl'))->SERVERPATH(), $vars);
    }
    
    //public static function html_li_menu(){return '<li><a id="menu_docu" href="#!docu"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> ${sai_menu_docu}</a></li>';}
    public static function html_li_menu(){return '<li><a id="menu_docu" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_docu}" href="#!docu"><span class="glyphicon glyphicon-book" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    //public static function css(){}
    public static function js(){
        return array(new \SYSTEM\PSAI('modules/saimod_sys_docu/js/saimod_sys_docu.js'));}
}