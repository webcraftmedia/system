<?php
namespace SYSTEM\PAGE;
class text {
    const NEW_ENTRY = 'new_text_entry';
    public static function id_tags($id){
        return \SYSTEM\DBD\SYS_TEXT_GET_ID_TAGS::QA(array($id));}
    //return all text values with certain tag and lang - array(id => text)
    public static function tag($tag, $lang = NULL,$fallback = true) {
        if($lang == NULL){
            $lang = \SYSTEM\locale::get();}

        if(!\SYSTEM\locale::isLang($lang)){
            throw new \Exception("The requested language is not supported: ".$lang);}
        
        $result = array();
        $res = \SYSTEM\DBD\SYS_TEXT_GET_TAG::QQ(array($tag,$lang));
        while($row = $res->next()){
            $result[$row['id']] = $row['text'];}
            
        if($fallback){
            $result2 = array();
            $res = \SYSTEM\DBD\SYS_TEXT_GET_TAG::QQ(array($tag,\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG)));
            while($row = $res->next()){
                $result2[$row['id']] = $row['text'];}
            if(count($result) < count($result2)){
                new \SYSTEM\LOG\WARNING('Texts with tag: '.$tag.' - '.(count($result2)-count($result)).' ids not found for lang: '.$lang.' - fallback to default lang.');}
            $result = array_merge($result2,$result);
        }
        return $result;
    }
    public static function tag_adv($tag, $lang = NULL,$fallback = true) {
        if($lang == NULL){
            $lang = \SYSTEM\locale::get();}

        if(!\SYSTEM\locale::isLang($lang)){
            throw new \Exception("The requested language is not supported: ".$lang);}
        
        $result = array();
        $res = \SYSTEM\DBD\SYS_TEXT_GET_TAG_ADV::QQ(array($tag,$lang));
        while($row = $res->next()){
            $result[$row['id']] = $row;}
            
        if($fallback){
            $result2 = array();
            $res = \SYSTEM\DBD\SYS_TEXT_GET_TAG_ADV::QQ(array($tag,\SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG)));
            while($row = $res->next()){
                $result2[$row['id']] = $row;}
            if(count($result) < count($result2)){
                new \SYSTEM\LOG\WARNING('Texts with tag: '.$tag.' - '.(count($result2)-count($result)).' ids not found for lang: '.$lang.' - fallback to default lang.');}
            $result = array_merge($result2,$result);
        }
        return $result;
    }
    //return textstring with certain id and lang
    public static function get($id, $lang = NULL,$fallback = true) {
        if($lang == NULL){
            $lang = \SYSTEM\locale::get();}

        if(!\SYSTEM\locale::isLang($lang)){
            throw new \Exception("The requested language is not supported: ".$lang);}

        $res = \SYSTEM\DBD\SYS_TEXT_GET_ID::Q1(array($id,$lang));
        if($fallback && !$res && $lang != \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG)){
            new \SYSTEM\LOG\WARNING('Text with id: '.$id.' not found for lang: '.$lang.' - fallback to default lang.');
            return self::get($id, \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG));}
        return $res ? $res['text'] : '';
    }
    public static function get_adv($id, $lang = NULL,$fallback = true) {
        if($lang == NULL){
            $lang = \SYSTEM\locale::get();}

        if(!\SYSTEM\locale::isLang($lang)){
            throw new \Exception("The requested language is not supported: ".$lang);}

        $res = \SYSTEM\DBD\SYS_TEXT_GET_ID_ADV::Q1(array($id,$lang));
        if($fallback && !$res && $lang != \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG)){
            new \SYSTEM\LOG\WARNING('Text with id: '.$id.' not found for lang: '.$lang.' - fallback to default lang.');
            return self::get_adv($id, \SYSTEM\CONFIG\config::get(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG));}
        return $res;
    }
    public static function search($search,$tag/*=null*/){
        $search = '%'.$search.'%';
        return \SYSTEM\DBD\SYS_TEXT_SEARCH_TAG::QA(array($tag,$search,$search,$search));}
    
    public static function save($id, $new_id, $lang, $tags, $text){
        if($new_id == self::NEW_ENTRY){
            return false;}
        //Insert
        if(!\SYSTEM\DBD\SYS_TEXT_SAVE::QI(array($id,$lang,$text,  \SYSTEM\SECURITY\Security::getUser()->id,\SYSTEM\SECURITY\Security::getUser()->id))){
            return false;}
        //delete all tags
        \SYSTEM\DBD\SYS_TEXT_DELETE_TAGS::QI(array($id));
        //Insert tags
        foreach($tags as $tag){
            if($tag){\SYSTEM\DBD\SYS_TEXT_SAVE_TAG::QI(array($id,$tag));}}
        //Rename
        \SYSTEM\DBD\SYS_TEXT_RENAME::QI(array($new_id,$id));
        \SYSTEM\DBD\SYS_TEXT_RENAME_TAGS::QI(array($new_id,$id));
        return true;
    }
  
    public static function delete($id, $lang = null){
        if(!\SYSTEM\DBD\SYS_TEXT_DELETE::QI(array($id,$lang))){
            return false;}
        if(\SYSTEM\DBD\SYS_TEXT_GET_ID_COUNT::Q1(array($id))['count'] == 0){
            \SYSTEM\DBD\SYS_TEXT_DELETE_TAGS::QI(array($id));}
        return true;
    }
}