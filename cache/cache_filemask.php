<?php
namespace SYSTEM\CACHE;
class cache_filemask {
    const CACHE_FILEMASK = 12;
    public static function put($file){
        $ext = pathinfo($file);
        $ext = strtoupper(array_key_exists('extension', $ext) ? $ext['extension'] : '');
        return \SYSTEM\CACHE\cache::put(self::CACHE_FILEMASK, self::ident($file), $ext ,$file);}
    public static function get($ident,$header = false){
        return \SYSTEM\CACHE\cache::get(self::CACHE_FILEMASK, $ident,$header);}
    public static function ident($file){
        return sha1($file);
    }
}