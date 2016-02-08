<?php
namespace SYSTEM\CACHE;
class cache_js {
    const CACHE_JS = 11;
    public static function put($ident,$data){
        return \SYSTEM\CACHE\cache::put(self::CACHE_JS, $ident, 'JS', $data);}
    public static function get($ident,$header = false){
        return \SYSTEM\CACHE\cache::get(self::CACHE_JS, $ident,$header);}
    public static function ident($files){
        $ident = '';
        foreach($files as $f){
            $ident .= $f->SERVERPATH().';';}
        return sha1($ident);
    }
    public static function url($files){
        $ident = self::ident($files);
        if(!\SYSTEM\CACHE\cache_js::get($ident)){
            \LIB\lib_minify::php();
            $minifier = new \MatthiasMullie\Minify\JS();
            foreach($files as $f){
                $minifier->add($f->SERVERPATH());}
            \SYSTEM\CACHE\cache_js::put($ident, $minifier->minify());}
        return './api.php?call=cache&id='.self::CACHE_JS.'&ident='.$ident;
    }
}