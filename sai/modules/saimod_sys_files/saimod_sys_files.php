<?php
namespace SYSTEM\SAI;

class saimod_sys_files extends \SYSTEM\SAI\SaiModule {    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_files_action_del($cat,$id){
        if(!\SYSTEM\FILES\files::delete($cat, $id)){
            throw new \SYSTEM\LOG\ERROR("delete problem");}
        
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_files_action_rn($cat,$id,$newid){   
        if(!\SYSTEM\FILES\files::rename($cat, $id, $newid)){
            throw new \SYSTEM\LOG\ERROR("rename problem");}
        
        return \SYSTEM\LOG\JsonResult::ok();
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_files_action_upload($cat){
        if(!\SYSTEM\FILES\files::put($cat, basename($_FILES['datei_'.$cat]['name']) , $_FILES['datei_'.$cat]['tmp_name'])){
            throw new \SYSTEM\LOG\ERROR("upload problem");}
        
        return \SYSTEM\LOG\JsonResult::ok();
    }
    public static function sai_mod__SYSTEM_SAI_saimod_sys_files(){
        $vars['tabopts'] = '';
        
        $res = \SYSTEM\FILES\files::get();
        foreach($res as $name=>$folder){
            $vars['tabopts'] .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_files/tpl/saimod_sys_files_tabopt.tpl'), array( 'name' => $name));}
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_FILES));    
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_files/tpl/saimod_sys_files.tpl'), $vars);
    }
    
    public static function sai_mod__SYSTEM_SAI_saimod_sys_files_action_tab($name = 'sys'){
        $result = '';
        $cat = \SYSTEM\FILES\files::get($name);
        $i = 0;
        foreach($cat as $file){
            $result .= \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_files/tpl/saimod_sys_files_list_entry.tpl'), array('i' => $i++, 'cat' => $name, 'name' => $file, 'extension' => substr($file,-3,3), 'url' => 'api.php?call=files&cat='.$name.'&id='.$file));}
        $vars['cat'] = $name;
        $vars['content'] = $result;
        $vars = array_merge($vars, \SYSTEM\PAGE\text::tag(\SYSTEM\DBD\system_text::TAG_SAI_FILES));    
        return \SYSTEM\PAGE\replace::replaceFile(\SYSTEM\SERVERPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_files/tpl/saimod_sys_files_list.tpl'), $vars);}
    
    //public static function html_li_menu(){return '<li><a id="menu_files" href="#!files">${sai_menu_files}</a></li>';}
    public static function html_li_menu(){return '<li><a id="menu_files" data-toggle="tooltip" data-placement="bottom" title="${sai_menu_files}" href="#!files"><span class="glyphicon glyphicon-duplicate" aria-hidden="true"></span></a></li>';}    
    public static function right_public(){return false;}    
    public static function right_right(){return \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI) && \SYSTEM\SECURITY\Security::check(\SYSTEM\SECURITY\RIGHTS::SYS_SAI_FILES);}
    
    //public static function css(){}
    public static function js(){
        return array(  \SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'modules/saimod_sys_files/js/saimod_sys_files.js'));}
}