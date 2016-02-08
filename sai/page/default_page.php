<?php
namespace SYSTEM\SAI;
class default_page extends \SYSTEM\PAGE\Page {
    private static function menu_sys(){                
        $result = '';
        $mods = \SYSTEM\SAI\sai::getSysModules();
        foreach($mods as $mod){
            if(\call_user_func(array($mod, 'right_public')) ||
               \call_user_func(array($mod, 'right_right'))){
                $result .= \call_user_func(array($mod, 'html_li_menu'));}
        }
        return $result;        
    }
    
    private static function menu_proj(){
        $result = '';        
        $mods = \SYSTEM\SAI\sai::getModules();
        foreach($mods as $mod){
            if(\call_user_func(array($mod, 'right_public')) ||
               \call_user_func(array($mod, 'right_right'))){
                $result .= \call_user_func(array($mod, 'html_li_menu'));}
        }
        return $result;        
    }
    
    private static function menu_start(){
        $mod = \SYSTEM\SAI\sai::getStartModule();        
        if(\call_user_func(array($mod, 'right_public')) ||
            \call_user_func(array($mod, 'right_right'))){
            return \call_user_func(array($mod, 'html_li_menu'));}        
        throw new \SYSTEM\LOG\ERROR('Your SAI-Start-Module haz a Problem - either it does not exist or it is not public - which is required!');}

    private static function css(){
        return  \SYSTEM\HTML\html::link(\LIB\lib_bootstrap::css()->WEBPATH(false)).
                \SYSTEM\HTML\html::link(\LIB\lib_tablesorter::css()->WEBPATH(false)).
                \SYSTEM\HTML\html::link(\SYSTEM\CACHE\cache_css::url(
                                        array( \LIB\lib_system::css(),
                                                new \SYSTEM\PSAI('page/css/sai_classes.css'),
                                                new \SYSTEM\PSAI('page/css/sai.css'))));
    }

    private static function js(){
        return  \SYSTEM\HTML\html::script(\LIB\lib_jquery::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_bootstrap::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_tablesorter::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_bootstrap_growl::js()->WEBPATH()).
                \SYSTEM\HTML\html::script(\LIB\lib_tinymce::js()->WEBPATH(false)).
                \SYSTEM\HTML\html::script(  \SYSTEM\CACHE\cache_js::url(
                                            array(  \LIB\lib_system::js(),
                                                    new \SYSTEM\PSAI('page/js/sai.js')))).
                \SYSTEM\HTML\html::script('https://www.google.com/jsapi').
                '<script type="text/javascript">google.load("visualization", "1", {packages:["corechart"]});</script>';
    }

    public function html($_escaped_fragment_ = NULL){
        $vars = array();
        $vars['css'] = self::css();
        $vars['js'] = '';
        if(!$_escaped_fragment_){
            $vars['js'] = self::js();}
        $vars['menu_languages'] = \SYSTEM\SAI\saimod_sys_langswitcher::lang_menu('./sai.php');   
        $vars['menu_start'] = self::menu_start();
        $vars['menu_sys'] = self::menu_sys();
        $vars['menu_proj'] = self::menu_proj();
        $vars = array_merge($vars,\SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_DEFAULT),
                            array(  'project' => \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_PROJECT),
                                    'project_url' => \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL)));
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('page/tpl/sai.tpl'))->SERVERPATH(), $vars);        
    }
}