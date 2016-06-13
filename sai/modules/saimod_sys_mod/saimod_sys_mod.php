<?php
/**
 * System - PHP Framework
 *
 * PHP Version 5.6
 *
 * @copyright   2016 Ulf Gebhardt (http://www.webcraft-media.de)
 * @license     http://www.opensource.org/licenses/mit-license.php MIT
 * @link        https://github.com/webcraftmedia/system
 * @package     SYSTEM\SAI
 */
namespace SYSTEM\SAI;

/**
 * saimod_sys_mod Class provided by System as saimod to display all registered saimods & libraries
 */
class saimod_sys_mod extends \SYSTEM\SAI\SaiModule {
    public static function sai_mod__SYSTEM_SAI_saimod_sys_mod_action_system(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_MOD);
        $vars['entries'] = '';
        $sys_mods = \SYSTEM\SAI\sai::getSysModules();
        foreach($sys_mods as $mod){
            $v = array();
            $v['mod'] = $mod;
            $v['public'] = \call_user_func(array($mod, 'right_public')) ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';
            $v['you'] = \call_user_func(array($mod, 'right_right')) ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';
            $vars['entries'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/mod_tr.tpl'))->SERVERPATH(),$v);
        }
        $mod = \SYSTEM\SAI\sai::getStartModule();
        $start = array();
        $start['start_class'] = $mod;
        $start['start_public'] = \call_user_func(array($mod, 'right_public')) ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';
        $start['start_access'] = \call_user_func(array($mod, 'right_right')) ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';
        $vars['saistart'] = \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/saistart.tpl'))->SERVERPATH(),$start);
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/mod_table.tpl'))->SERVERPATH(),$vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_mod_action_project(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_MOD);
        $vars['entries'] = $vars['saistart'] = '';
        $mods = \SYSTEM\SAI\sai::getModules();
        foreach($mods as $mod){
            $v = array();
            $v['mod'] = $mod;
            $v['public'] = \call_user_func(array($mod, 'right_public')) ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';
            $v['you'] = \call_user_func(array($mod, 'right_right')) ? '<span class="glyphicon glyphicon-ok"></span>' : '<span class="glyphicon glyphicon-remove"></span>';
            $vars['entries'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/mod_tr.tpl'))->SERVERPATH(),$v);
        }
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/mod_table.tpl'))->SERVERPATH(),$vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_mod_action_lib(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_MOD);
        $vars['entries'] = '';
        $libs = \LIB\lib_controll::all();
        foreach($libs as $lib){
            $vars2 = array();
            $vars2['lib'] = $lib;
            $vars2['version'] = \call_user_func($lib.'::version');
            $parents = \class_parents($lib);
            $vars2['interface'] =   (\array_search('LIB\lib_php', $parents) ? 'php, ' : '').
                                    (\array_search('LIB\lib_js', $parents) ? 'js, ' : '').
                                    (\array_search('LIB\lib_css', $parents) ? 'css, ' : '').
                                    (\array_search('LIB\lib_jscss', $parents) ? 'js, css, ' : '');
            $vars2['interface'] = \substr($vars2['interface'],0,-2);
            $vars['entries'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/lib_tr.tpl'))->SERVERPATH(),$vars2);
        }
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/lib_table.tpl'))->SERVERPATH(),$vars);
    }
    
    /**
     * Generate the HTML for the Saimods startpage
     * 
     * @return string Returns HTML for the Saimods startpage
     */
    public static function sai_mod__SYSTEM_SAI_saimod_sys_mod(){
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_mod/tpl/mods.tpl'))->SERVERPATH(),\SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_MOD));}
    
    /**
     * Generate <li> Menu for the Saimod
     * 
     * @return string Returns <li> Menu for the Saimod
     */
    public static function html_li_menu(){return '<li><a id="menu_mod" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_mod}" href="#!mod"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>';}    
    
    /**
     * Returns if the Saimod is public(access for everyone)
     * 
     * @return boolean Returns if the Saimod is public(true) or not(false)
     */
    public static function right_public(){return false;}
    
    /**
     * Returns if the requesting user has the required rights to access the Saimod
     * 
     * @return boolean Returns true if the user can access
     */
    public static function right_right(){return \SYSTEM\SECURITY\security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI);}
    
    /**
     * Get all js System Paths required for this Saimod
     * 
     * @return array Returns array of Pathobjects pointing to the saimods js
     */
    public static function js(){
        return array(new \SYSTEM\PSAI('modules/saimod_sys_mod/js/saimod_sys_mod.js'));}
}