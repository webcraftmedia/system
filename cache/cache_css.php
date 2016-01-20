<?php
namespace SYSTEM\CACHE;
class cache_css {
    const CACHE_CSS = 10;
    public static function put($ident,$data){
        return \SYSTEM\CACHE\cache::put(self::CACHE_CSS, $ident, 'CSS', $data);}
    public static function get($ident,$header = false){
        return \SYSTEM\CACHE\cache::get(self::CACHE_CSS, $ident,$header);}
    public static function ident($files){
        $ident = '';
        foreach($files as $f){
            $ident .= $f->SERVERPATH().';';}
        return sha1($ident);
    }
    public static function url($files){
        $ident = self::ident($files);
        if(!\SYSTEM\CACHE\cache_css::get($ident)){
            \LIB\lib_minify::php();
            $minifier = new \MatthiasMullie\Minify\CSS();
            foreach($files as $f){
                $minifier->add($f->SERVERPATH());}
            \SYSTEM\CACHE\cache_css::put($ident, $minifier->minify());}
        return './api.php?call=cache&id='.self::CACHE_CSS.'&ident='.$ident;
    }
}