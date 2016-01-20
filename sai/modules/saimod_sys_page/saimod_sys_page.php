<?php
namespace SYSTEM\SAI;
class saimod_sys_page extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_page(){
        $vars = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_PAGE);
        $vars['tabopts'] = '';
        
        $res = \SYSTEM\SQL\SYS_SAIMOD_PAGE_GROUPS::QQ();
        while($r = $res->next()){
            $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_page/tpl/tabopt.tpl'))->SERVERPATH(), array( 'tab_id' => $r['group']));}
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_page/tpl/saimod_sys_page.tpl'))->SERVERPATH(), $vars);
    }
    
    public static function sai_mod__system_sai_saimod_sys_page_action_list($group=null){
        $res = \SYSTEM\SQL\SYS_SAIMOD_PAGE_GET::QQ();
        $tab = \SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_PAGE);
        $tab['content'] = '';
        while($r = $res->next()){            
            if($group != null && $r['group'] != $group){
                continue;}
            $tab['tab_id'] = $r['group'];
            $r['tr_class'] = self::tablerow_class($r['type']);
            $r['type'] = self::type_names($r['type']);
            $tab['content'] .= \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_page/tpl/list_entry.tpl'))->SERVERPATH(), $r);
        }      
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_page/tpl/saimod_sys_page_list.tpl'))->SERVERPATH(), $tab);
    }
    
    public static function sai_mod__system_sai_saimod_sys_page_action_deletedialog($ID,$group){
        $res = \SYSTEM\SQL\SYS_SAIMOD_PAGE_SINGLE_SELECT::Q1(array($ID,$group));
        $res = array_merge($res,\SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_PAGE));
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_page/tpl/delete_dialog.tpl'))->SERVERPATH(), $res);
    }
    public static function sai_mod__system_sai_saimod_sys_page_action_newdialog(){
        return \SYSTEM\PAGE\replace::replaceFile((new \SYSTEM\PSAI('modules/saimod_sys_page/tpl/new_dialog.tpl'))->SERVERPATH(),\SYSTEM\PAGE\text::tag(\SYSTEM\SQL\system_text::TAG_SAI_PAGE));}
    
    public static function sai_mod__system_sai_saimod_sys_page_action_addcall($ID,$group,$type,$parentID,$parentValue,$name,$verify){
        if(!\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_API)){
            throw new \SYSTEM\LOG\ERROR("You dont have edit Rights - Cant proceeed");}
        if($parentValue == ''){ $parentValue = NULL;}
        if($verify      == ''){ $verify = NULL;}
        \SYSTEM\SQL\SYS_SAIMOD_PAGE_ADD::QI(array($ID,$group,$type,$parentID,$parentValue,$name,$verify));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function sai_mod__system_sai_saimod_sys_page_action_deletecall($ID,$group){
        if(!\SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_API)){
            throw new \SYSTEM\LOG\ERROR("You dont have edit Rights - Cant proceeed");}
        \SYSTEM\SQL\SYS_SAIMOD_PAGE_DEL::QI(array($ID,$group));
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    private static function type_names($type){
        switch($type){
            case 0: return 'STATIC';
            case 1: return 'DYNAMIC';
            default: return 'Problem unknown type';
        }   
    }
    
    private static function tablerow_class($flag){
        switch($flag){
            case 0: return 'success';
            case 1: return 'info';
            default: return '';
        }        
    }
    
    //public static function html_li_menu(){return '<li><a id="menu_page" href="#!page">${sai_menu_page}</a></li>';}
    public static function html_li_menu(){return '<li><a id="menu_page" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_page}" href="#!page"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span></a></li>';}
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI) && \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_API);}
    
    public static function css(){
        return array(new \SYSTEM\PSAI('modules/saimod_sys_page/css/saimod_sys_page.css'));}
    public static function js(){
        return array(new \SYSTEM\PSAI('modules/saimod_sys_page/js/saimod_sys_page.js'));}
}