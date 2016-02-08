<?php
namespace SYSTEM\CACHE;
class cache {    
    public static function get($cache, $ident,$header = false){
        $result = \SYSTEM\SQL\SYS_CACHE_CHECK::Q1(array($cache,$ident));
        if(!$result){
            return NULL;}
        if($header){
            if(\SYSTEM\HEADER::available($result['type'])){
                call_user_func('\SYSTEM\HEADER::'.$result['type']);
            }else{
                \SYSTEM\HEADER::FILE($ident);}
        }
        return $result['cache'] == \SYSTEM\CACHE\cache_filemask::CACHE_FILEMASK ? \file_get_contents($result['data']) : $result['data'];
    }
    
    public static function put($cache, $ident, $type, $data, $fail_on_exist = false){        
        if(($fail_on_exist && self::get($cache,$ident) != NULL)){
            return false;}
                        
        $result = \SYSTEM\SQL\SYS_CACHE_PUT::Q1(array($cache,$ident, $type, $data));                
        return $result ? $data : NULL;
    }
    
    public static function del($cache, $ident){
        $result = \SYSTEM\SQL\SYS_CACHE_DELETE::Q1(array($cache,$ident));                
        return $result ? true : false;                                                          
    }
}