<?php
namespace SYSTEM\SAI;
class saimod_sys_config extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_config(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_CONFIG);
        $vars['basics'] = $vars['database'] = $vars['sai'] = '';
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_RESULT,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_RESULT',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_RESULT)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS',
                                    'value' =>implode(',',\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS))));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG)));
        
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PASSWORD,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PASSWORD',
                                    'value' =>'&lt;hidden&gt;'));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME)));

        $vars['sai'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                        array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT,
                                'name' =>'\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT',
                                'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT)));
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config.tpl'))->SERVERPATH(),$vars);
    }
    //public static function html_li_menu(){return '<li><a id="menu_config" href="#!config">${sai_menu_config}</a></li>';}
    public static function sai_mod__SYSTEM_SAI_saimod_sys_config_action_basics(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_CONFIG);
        $vars['basics'] = $vars['database'] = $vars['sai'] = '';
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_RESULT,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_RESULT',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_RESULT)));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS',
                                    'value' =>implode(',',\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS))));
        $vars['basics'] .=  \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG)));
    
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_basics.tpl'))->SERVERPATH(),$vars);
    }
    public static function sai_mod__SYSTEM_SAI_saimod_sys_config_action_database(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_CONFIG);
        $vars['database'] = '';
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER)));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PASSWORD,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PASSWORD',
                                    'value' =>'&lt;hidden&gt;'));
        $vars['database'] .=\SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                            array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME,
                                    'name' =>'\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME',
                                    'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME)));
    
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_database.tpl'))->SERVERPATH(),$vars);
    }
    public static function sai_mod__SYSTEM_SAI_saimod_sys_config_action_sai(){
        $vars['sai'] = '';
        $vars['sai'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_tr.tpl'))->SERVERPATH(),
                        array(  'id' =>\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT,
                                'name' =>'\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT',
                                'value' =>\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT)));
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_sai.tpl'))->SERVERPATH(),$vars);
    
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_config/tpl/config_database.tpl'))->SERVERPATH(),$vars);
    }
    public static function html_li_menu(){return '<li><a id="menu_config" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_config}" href="#!config"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    public static function js(){
        return array(new \SYSTEM\PSAI('modules/saimod_sys_config/js/saimod_sys_config.js'));}
    //public static function css(){}
}