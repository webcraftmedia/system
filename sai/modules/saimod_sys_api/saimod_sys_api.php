<?php
namespace SYSTEM\SAI;
class saimod_sys_api extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_api(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_API);
        $vars['tabopts'] = '';
        
        $res = \SYSTEM\DBD\SYS_SAIMOD_API_GROUPS::QQ();
        
        while($r = $res->next()){
            $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/tpl/tabopt.tpl'), array( 'tab_id' => $r['group']));}
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/tpl/saimod_sys_api.tpl'), $vars);
    }
    
    public static function sai_mod__system_sai_saimod_sys_api_action_list($group=null){
        $res = \SYSTEM\DBD\SYS_SAIMOD_API_GET::QQ();
        $tab = array('content' => '');
        while($r = $res->next()){            
            if($group != null && $r['group'] != $group){
                continue;}
            $tab['tab_id'] = $r['group'];
            $r['tr_class'] = self::tablerow_class($r['type']);
            $r['type'] = self::type_names($r['type']);
            $tab['content'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/tpl/list_entry.tpl'), $r);
        }
        $tab = array_merge($tab,\SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_API));
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/tpl/saimod_sys_api_list.tpl'), $tab);
    }
    
    public static function sai_mod__system_sai_saimod_sys_api_action_deletedialog($ID,$group){
        $res = \SYSTEM\DBD\SYS_SAIMOD_API_SINGLE_SELECT::Q1(array($ID,$group));
        $res = array_merge($res,\SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_API));
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/tpl/delete_dialog.tpl'), $res);
    }
    public static function sai_mod__system_sai_saimod_sys_api_action_newdialog(){
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/tpl/new_dialog.tpl'),\SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_API));}
    
    public static function sai_mod__system_sai_saimod_sys_api_action_addcall($ID,$group,$type,$parentID,$parentValue,$name,$verify){
        if(!\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_API)){
            throw new \SYSTEM\LOG\ERROR("You dont have edit Rights - Cant proceeed");}
        if($parentValue == ''){ $parentValue = NULL;}
        if($verify      == ''){ $verify = NULL;}
        \SYSTEM\DBD\SYS_SAIMOD_API_ADD::QI(array($ID,$group,$type,$parentID,$parentValue,$name,$verify));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function sai_mod__system_sai_saimod_sys_api_action_deletecall($ID,$group){
        if(!\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_API)){
            throw new \SYSTEM\LOG\ERROR("You dont have edit Rights - Cant proceeed");}
        \SYSTEM\DBD\SYS_SAIMOD_API_DEL::QI(array($ID,$group));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    private static function type_names($type){
        switch($type){
            case 0: return 'COMMAND';
            case 1: return 'COMMAND_FLAG';
            case 2: return 'PARAMETER';
            case 3: return 'PARAMETER_OPT';
            case 4: return 'STATIC';
            default: return 'Problem unknown type';
        }   
    }
    
    private static function tablerow_class($flag){
        switch($flag){
            case 0: return 'info';
            case 1: return '';
            case 4: return 'warning';
            default: return 'success';
        }        
    }
    
    //public static function html_li_menu(){return '<li><a id="menu_api" href="#!api">${sai_menu_api}</a></li>';}
    public static function html_li_menu(){return '<li><a id="menu_api" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_api}" href="#!api"><span class="glyphicon glyphicon-console" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI) && \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_API);}
    
    public static function css(){
        return array(\SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/css/saimod_sys_api.css'));}
    public static function js(){
        return array(  \SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_api/js/saimod_sys_api.js'));}
}