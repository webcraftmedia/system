<?php
namespace SYSTEM\SAI;

class saimod_sys_text extends \SYSTEM\SAI\SaiModule {
    
    public static function getLanguages(){
        return \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS);}

    public static function sai_mod__SYSTEM_SAI_saimod_sys_text(){        
        $vars = array();                        
        $res = \SYSTEM\DBD\SYS_SAIMOD_LOCALE_TAGS::QQ();
        $vars['tabopts'] = '';
        $first = true;
        $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/tabopt.tpl'),  array( 'active' => ($first ? 'active' : ''), 'tag' => 'All'));
        while($r = $res->next()){
            $vars2 = array( 'active' => ($first ? 'active' : ''),
                            'tag' => $r['tag']);
            $first = false;
            $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/tabopt.tpl'), $vars2);
        }           
        $langtab_ = '';
        foreach (self::getLanguages() as $lang){
            $details['langs'] = $lang;
            $langtab_ .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/langtabopt.tpl'), $details);
            $languages[] = $lang;
        }    
        $langtab['langs'] = $langtab_;
        $langhead = \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/langtabs.tpl'), $langtab);
        $vars['tabs'] = $langhead;
        $vars['langs'] = $langtab_;
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/main.tpl'), $vars);
                //.\SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/editmode.tpl'), $vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_text_action_loadAll(){
        $con = new \SYSTEM\DB\Connection();
        if(\SYSTEM\system::isSystemDbInfoPG()){
            //$query = 'SELECT id, "'.$lang.'" FROM '.\SYSTEM\DBD\system_locale_string::NAME_PG.' WHERE category='.$group.' ORDER BY category ASC;';
        } else {
            $query = 'SELECT * FROM system_text;';
            new \SYSTEM\LOG\WARNING($query);
        }
        $res = $con->query($query);
        $entries = '';
        $temparr = array();
        $entries .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/table_start.tpl'), array());
        while($r = $res->next()){  
            $temparr['id'] = $r['id'];
            $temparr['text'] = $r['text'];
            $temparr['author'] = $r['author'];
            $temparr['language'] = $r['language'];
            $entries .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/entry.tpl'), $temparr);
        }
        $entries .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/table_end.tpl'), array());
        return $entries;
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_text_action_loadByTag($tag, $lang){
        $con = new \SYSTEM\DB\Connection();
        $result = "";
        $query = " 
            SELECT system_text_tag.tag, system_text.* FROM system_text_tag
            LEFT JOIN system_text ON system_text_tag.id = system_text.id
            WHERE tag = '".$tag."' AND language = '".$lang."'";
             
        $res = $con->query($query);
        $entries = '';
        while($r = $res->next()){  
            $entries .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/entry.tpl'), $r);
        }
        return $entries;   
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_text_action_tag($tag = null){
        if ($tag) {
            $con = new \SYSTEM\DB\Connection();
            $result = "";
            $query = " 
                SELECT system_text_tag.tag, system_text.* FROM system_text_tag
                LEFT JOIN system_text ON system_text_tag.id = system_text.id
                WHERE tag = '".$tag."'";

            $res = $con->query($query);
            $entries = '';
            while($r = $res->next()){  
                $entries .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/entry.tpl'), $r);
            }
            return $entries; 
        } else {
            return self::sai_mod__SYSTEM_SAI_saimod_sys_text_action_loadAll();
        }
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_text_action_edittext($id, $lang){
        $con = new \SYSTEM\DB\Connection();
        $result = "";
        $entries = '';
        $res = \SYSTEM\DBD\SYS_SAIMOD_TEXT_GETTEXT::QQ(array($id));
        while($r = $res->next()){  
            $entries .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tpl/edit.tpl'), $r);
        }
        return $entries; 
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_text_action_add($id, $category){                
        return \SYSTEM\DBD\SYS_SAIMOD_LOCALE_ADD::QI(array($id, $category)) ? \SYSTEM\LOG\JsonResult::ok() : \SYSTEM\LOG\JsonResult::error(new \SYSTEM\LOG\WARNING("no data added"));}
  
    public static function sai_mod__SYSTEM_SAI_saimod_sys_text_action_delete($id){
        return \SYSTEM\DBD\SYS_SAIMOD_LOCALE_DEL::QI(array($id)) ? \SYSTEM\LOG\JsonResult::ok() : \SYSTEM\LOG\JsonResult::error(new \SYSTEM\LOG\WARNING("could not delete the permitted data"));}
      
    public static function html_li_menu(){return '<li><a id="menu_text" href="#!text">Text</a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI) && \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_LOCALE);}
    
    //public static function css(){}
    public static function js(){
        return array( // \SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/tinymce/tinymce.min.js'),
                       \SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_text/js/saimod_sys_text.js'));}
}